<!--datos convenio-->
<div id="editarConvenioInstitucion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editarConvenioInstitucion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white d-inline mt-1">Edición Convenio</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <!--Pills-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card bg-light">
                            <div class="card-body">
                                <ul class="nav nav-pills" id="pills-tab-edicion" role="tablist">
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-info mr-1 active" id="pills-empresas-edicion-tab" data-toggle="pill" href="#pills-empresas-edicion" role="tab" aria-controls="pills-empresas-edicion" aria-selected="true">
                                            Empresas
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-info mr-1" id="pills-instituciones-edicion-tab" data-toggle="pill" href="#pills-instituciones-edicion" role="tab" aria-controls="pills-instituciones-edicion" aria-selected="false">
                                            Instituciones
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-info mr-1" id="pills-ffaa-edicion-tab" data-toggle="pill" href="#pills-ffaa-edicion" role="tab" aria-controls="pills-ffaa-edicion" aria-selected="false">
                                            FFAA y Cajas de compensación
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-sm btn-outline-info mr-1" id="pills-especiales-edicion-tab" data-toggle="pill" href="#pills-especiales-edicion" role="tab" aria-controls="pills-especiales-edicion" aria-selected="false">
                                            Especiales
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-4" id="pills-tab-edicion-content">
                                    <!-- Tab Empresas -->
                                    <div class="tab-pane fade show active" id="pills-empresas-edicion" role="tabpanel" aria-labelledby="pills-empresas-edicion-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Nombre Convenio</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombre_convenio_prevision_editar" name="nombre_convenio_prevision_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tipo Convenio</label>
                                                    <select name="tipo_convenio_edicion" id="tipo_convenio_edicion" class="form-control form-control-sm">
                                                        <option value="0">Seleccione</option>
                                                        @foreach($tipos_convenio as $key_tc => $value_tc)
                                                            <option value="{{ $value_tc->id }}">{{ $value_tc->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Porcentaje</label>
                                                    <input type="number" class="form-control form-control-sm" name="porcentaje_dcto_edicion" id="porcentaje_dcto_edicion">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Lugar de Atención</label>
                                                    <select name="lugar_atencion_edicion" id="lugar_atencion_edicion" class="form-control form-control-sm">
                                                        <option value="0">Seleccione</option>
                                                        @if(isset($lugares_atencion))
                                                            @foreach($lugares_atencion as $key_la => $value_la)
                                                                <option value="{{ $value_la->lugar_atencion_id }}">{{ $value_la->lugar_atencion_nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Inicial</label>
                                                    <input type="date" class="form-control form-control-sm" value="" id="fecha_inicial_pago_convenio_edicion" name="fecha_inicial_pago_convenio_edicion">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Final</label>
                                                    <input type="date" class="form-control form-control-sm" value="" id="fecha_final_pago_convenio_edicion" name="fecha_final_pago_convenio_edicion">
                                                </div>
                                            </div>
                                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                <div class="form-group mb-0">
                                                    <label class="floating-label-activo-sm d-block text-center mb-2">Indefinido</label>
                                                    <div class="switch switch-success d-inline-block">
                                                        <input type="checkbox" id="convenio_infinito_edicion" name="convenio_infinito_edicion" class="switch-input" onclick="toggleFechaFinal()">
                                                        <label for="convenio_infinito_edicion" class="cr"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Observaciones</label>
                                                    <textarea name="observaciones_edicion_convenio" id="observaciones_edicion_convenio" cols="30" rows="4" class="form-control form-control-sm"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-warning btn-sm float-right" onclick="guardar_edicion_convenio_institucion()"><i class="fas fa-edit"></i> Guardar</button>
                                    </div>

                                    <!-- Tab Instituciones -->
                                    <div class="tab-pane fade" id="pills-instituciones-edicion" role="tabpanel" aria-labelledby="pills-instituciones-edicion-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h6 class="text-c-blue mb-2">Convenios</h6>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_1">
                                                    <label class="custom-control-label" id="text_convenio_editar_1" for="convenio_editar_1">Particular</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_2">
                                                    <label class="custom-control-label" id="text_convenio_editar_2" for="convenio_editar_2">Fonasa</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_3">
                                                    <label class="custom-control-label" id="text_convenio_editar_3" for="convenio_editar_3">Todas las Isapres</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_4">
                                                    <label class="custom-control-label" id="text_convenio_editar_4" for="convenio_editar_4">Banmédica</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_5">
                                                    <label class="custom-control-label" id="text_convenio_editar_5" for="convenio_editar_5">Colmena</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_6">
                                                    <label class="custom-control-label" id="text_convenio_editar_6" for="convenio_editar_6">Nueva Masvida</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_7">
                                                    <label class="custom-control-label" id="text_convenio_editar_7" for="convenio_editar_7">Consalud</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_8">
                                                    <label class="custom-control-label" id="text_convenio_editar_8" for="convenio_editar_8">Cruz Blanca</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_9">
                                                    <label class="custom-control-label" id="text_convenio_editar_9" for="convenio_editar_9">Cruz del Norte</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_10">
                                                    <label class="custom-control-label" id="text_convenio_editar_10" for="convenio_editar_10">Vida Tres</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_11">
                                                    <label class="custom-control-label" id="text_convenio_editar_11" for="convenio_editar_11">Fundación</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_12">
                                                    <label class="custom-control-label" id="text_convenio_editar_12" for="convenio_editar_12">Isalud</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Nombre Tipo Atención</label>
                                                    <input type="text" class="form-control form-control-sm" id="tipo_atencion_editar" name="tipo_atencion_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Valor</label>
                                                    <input type="number" class="form-control form-control-sm" id="valor_editar" name="valor_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Valor Garantía</label>
                                                    <input type="number" class="form-control form-control-sm" id="valor_garantia_editar" name="valor_garantia_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Porcentaje (%)</label>
                                                    <input type="number" class="form-control form-control-sm" id="porcentaje_editar" name="porcentaje_editar" step="0.01">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Lugar de Atención</label>
                                                    <select name="lugar_atencion_inst_edicion" id="lugar_atencion_inst_edicion" class="form-control form-control-sm">
                                                        <option value="0">Seleccione</option>
                                                        @if(isset($lugares_atencion))
                                                            @foreach($lugares_atencion as $key_la => $value_la)
                                                                <option value="{{ $value_la->lugar_atencion_id }}">{{ $value_la->lugar_atencion_nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Copago Fonasa</label>
                                                    <input type="number" class="form-control form-control-sm" id="copago_fonasa_editar" name="copago_fonasa_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Bono Fonasa</label>
                                                    <input type="number" class="form-control form-control-sm" id="bono_fonasa_editar" name="bono_fonasa_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Inicial</label>
                                                    <input type="date" class="form-control form-control-sm" value="" id="fecha_inicial_inst_edicion" name="fecha_inicial_inst_edicion">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Final</label>
                                                    <input type="date" class="form-control form-control-sm" value="" id="fecha_final_inst_edicion" name="fecha_final_inst_edicion">
                                                </div>
                                            </div>
                                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                <div class="form-group mb-0">
                                                    <label class="floating-label-activo-sm d-block text-center mb-2">Indefinido</label>
                                                    <div class="switch switch-success d-inline-block">
                                                        <input type="checkbox" id="convenio_infinito_inst_edicion" name="convenio_infinito_inst_edicion" class="switch-input" onclick="toggleFechaFinalInst()">
                                                        <label for="convenio_infinito_inst_edicion" class="cr"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-warning btn-sm float-right" onclick="guardar_edicion_convenio_institucion()"><i class="fas fa-edit"></i> Guardar</button>
                                    </div>

                                    <!-- Tab FFAA -->
                                    <div class="tab-pane fade" id="pills-ffaa-edicion" role="tabpanel" aria-labelledby="pills-ffaa-edicion-tab">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <h6 class="text-c-blue mb-2">Convenios</h6>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_ffa1">
                                                    <label class="custom-control-label" for="convenio_editar_ffa1">Ejército</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_ffa2">
                                                    <label class="custom-control-label" for="convenio_editar_ffa2">Armada</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_ffa3">
                                                    <label class="custom-control-label" for="convenio_editar_ffa3">Bomberos</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_ffa4">
                                                    <label class="custom-control-label" for="convenio_editar_ffa4">Fuerza Aérea</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_ffa5">
                                                    <label class="custom-control-label" for="convenio_editar_ffa5">Carabineros</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_ffa6">
                                                    <label class="custom-control-label" for="convenio_editar_ffa6">PDI</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_ffa7">
                                                    <label class="custom-control-label" for="convenio_editar_ffa7">Caja Los Andes</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_ffa8">
                                                    <label class="custom-control-label" for="convenio_editar_ffa8">Caja La Araucana</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_ffa9">
                                                    <label class="custom-control-label" for="convenio_editar_ffa9">Caja 18 de Septiembre</label>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="convenio_editar_ffa10">
                                                    <label class="custom-control-label" for="convenio_editar_ffa10">Caja Los Héroes</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Nombre Tipo Atención</label>
                                                    <input type="text" class="form-control form-control-sm" id="tipo_atencion_ffa_editar" name="tipo_atencion_ffa_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Valor</label>
                                                    <input type="number" class="form-control form-control-sm" id="valor_ffa_editar" name="valor_ffa_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Valor Garantía</label>
                                                    <input type="number" class="form-control form-control-sm" id="valor_garantia_ffa_editar" name="valor_garantia_ffa_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Porcentaje (%)</label>
                                                    <input type="number" class="form-control form-control-sm" id="porcentaje_ffa_editar" name="porcentaje_ffa_editar" step="0.01">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Lugar de Atención</label>
                                                    <select name="lugar_atencion_ffa_edicion" id="lugar_atencion_ffa_edicion" class="form-control form-control-sm">
                                                        <option value="0">Seleccione</option>
                                                        @if(isset($lugares_atencion))
                                                            @foreach($lugares_atencion as $key_la => $value_la)
                                                                <option value="{{ $value_la->lugar_atencion_id }}">{{ $value_la->lugar_atencion_nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Copago Fonasa</label>
                                                    <input type="number" class="form-control form-control-sm" id="copago_fonasa_ffa_editar" name="copago_fonasa_ffa_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Bono Fonasa</label>
                                                    <input type="number" class="form-control form-control-sm" id="bono_fonasa_ffa_editar" name="bono_fonasa_ffa_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Inicial</label>
                                                    <input type="date" class="form-control form-control-sm" value="" id="fecha_inicial_ffa_edicion" name="fecha_inicial_ffa_edicion">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Final</label>
                                                    <input type="date" class="form-control form-control-sm" value="" id="fecha_final_ffa_edicion" name="fecha_final_ffa_edicion">
                                                </div>
                                            </div>
                                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                <div class="form-group mb-0">
                                                    <label class="floating-label-activo-sm d-block text-center mb-2">Indefinido</label>
                                                    <div class="switch switch-success d-inline-block">
                                                        <input type="checkbox" id="convenio_infinito_ffa_edicion" name="convenio_infinito_ffa_edicion" class="switch-input" onclick="toggleFechaFinalFFA()">
                                                        <label for="convenio_infinito_ffa_edicion" class="cr"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-warning btn-sm float-right" onclick="guardar_edicion_convenio_ffa()"><i class="fas fa-edit"></i> Guardar</button>
                                    </div>

                                    <!-- Tab Especiales -->
                                    <div class="tab-pane fade" id="pills-especiales-edicion" role="tabpanel" aria-labelledby="pills-especiales-edicion-tab">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Nombre Convenio</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombre_convenio_especial_editar" name="nombre_convenio_especial_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tipo Convenio</label>
                                                    <select name="tipo_convenio_especial_edicion" id="tipo_convenio_especial_edicion" class="form-control form-control-sm">
                                                        <option value="0">Seleccione</option>
                                                        @if(isset($tipos_convenio))
                                                            @foreach($tipos_convenio as $key_tc => $value_tc)
                                                                <option value="{{ $value_tc->id }}">{{ $value_tc->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Porcentaje</label>
                                                    <input type="number" class="form-control form-control-sm" name="porcentaje_dcto_especial_edicion" id="porcentaje_dcto_especial_edicion">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Tipo Convenio Inst</label>
                                                    <select name="tipo_convenio_institucion_especial_edicion" id="tipo_convenio_institucion_especial_edicion" class="form-control form-control-sm">
                                                        <option value="0">Seleccione</option>
                                                        @if(isset($tipos_convenio_institucion))
                                                            @foreach($tipos_convenio_institucion as $key_tc => $value_tc)
                                                                <option value="{{ $value_tc->id }}">{{ $value_tc->nombre }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Inicial</label>
                                                    <input type="date" class="form-control form-control-sm" id="fecha_inicial_especial_edicion" name="fecha_inicial_especial_edicion">
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Fecha Final</label>
                                                    <input type="date" class="form-control form-control-sm" id="fecha_final_especial_edicion" name="fecha_final_especial_edicion">
                                                </div>
                                            </div>
                                            <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                <div class="form-group mb-0">
                                                    <label class="floating-label-activo-sm d-block text-center mb-2">Indefinido</label>
                                                    <div class="switch switch-success d-inline-block">
                                                        <input type="checkbox" id="convenio_infinito_especial_edicion" name="convenio_infinito_especial_edicion" class="switch-input" onclick="toggleFechaFinalEspecial()">
                                                        <label for="convenio_infinito_especial_edicion" class="cr"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm" for="productos_convenio_especial_editar">Productos a Convenir</label>
                                                    <select class="form-control form-control-sm" name="productos_convenio_especial_editar" id="productos_convenio_especial_editar" multiple="multiple">
                                                        @if(isset($tipoproducto_convenios))
                                                            @foreach($tipoproducto_convenios as $tp)
                                                                <option value="{{ $tp->id }}">{{ $tp->descripcion }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Rut Representante</label>
                                                    <input type="text" class="form-control form-control-sm" id="rut_representante_especial_editar" name="rut_representante_especial_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Nombre Representante</label>
                                                    <input type="text" class="form-control form-control-sm" id="nombre_representante_especial_editar" name="nombre_representante_especial_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Teléfono</label>
                                                    <input type="text" class="form-control form-control-sm" id="telefono_representante_especial_editar" name="telefono_representante_especial_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Email</label>
                                                    <input type="email" class="form-control form-control-sm" id="email_representante_especial_editar" name="email_representante_especial_editar">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Dirección</label>
                                                    <input type="text" class="form-control form-control-sm" id="direccion_representante_especial_editar" name="direccion_representante_especial_editar">
                                                </div>
                                            </div>
                                        </div> --}}

                                        <hr>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="floating-label-activo-sm">Observaciones</label>
                                                    <textarea name="observaciones_especial_edicion" id="observaciones_especial_edicion" cols="30" rows="4" class="form-control form-control-sm"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-outline-warning btn-sm float-right" onclick="guardar_edicion_convenio_especial()"><i class="fas fa-edit"></i> Guardar</button>
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

<script>
function toggleFechaFinal(){
    if($('#convenio_infinito_edicion').is(':checked')){
        $('#fecha_final_pago_convenio_edicion').prop('disabled', true);
        $('#fecha_final_pago_convenio_edicion').val('');
    }else{
        $('#fecha_final_pago_convenio_edicion').prop('disabled', false);
    }
}

function toggleFechaFinalEspecial(){
    if($('#convenio_infinito_especial_edicion').is(':checked')){
        $('#fecha_final_especial_edicion').prop('disabled', true);
        $('#fecha_final_especial_edicion').val('');
    }else{
        $('#fecha_final_especial_edicion').prop('disabled', false);
    }
}

function toggleFechaFinalInst(){
    if($('#convenio_infinito_inst_edicion').is(':checked')){
        $('#fecha_final_inst_edicion').prop('disabled', true);
        $('#fecha_final_inst_edicion').val('');
    }else{
        $('#fecha_final_inst_edicion').prop('disabled', false);
    }
}

function toggleFechaFinalFFA(){
    if($('#convenio_infinito_ffa_edicion').is(':checked')){
        $('#fecha_final_ffa_edicion').prop('disabled', true);
        $('#fecha_final_ffa_edicion').val('');
    }else{
        $('#fecha_final_ffa_edicion').prop('disabled', false);
    }
}

function guardar_edicion_convenio_institucion(){
    console.log('Guardar edición convenio institución');
    var id_convenio_institucion = $('#id_convenio_institucion').val();

    // Obtener la pestaña activa
    var tabActiva = $('.tab-pane.active').attr('id');
    console.log('Pestaña activa: ' + tabActiva);
    // Si es pestaña de Empresas, validar campos de empresas
    if(tabActiva === 'pills-empresas-edicion'){
        var nombre_convenio_edicion = $('#nombre_convenio_prevision_editar').val();
        var tipo_convenio_edicion = $('#tipo_convenio_edicion').val();
        var porcentaje_dcto_edicion = $('#porcentaje_dcto_edicion').val();
        var lugar_atencion_edicion = $('#lugar_atencion_edicion').val();
        var fecha_inicial_pago_convenio_edicion = $('#fecha_inicial_pago_convenio_edicion').val();
        var fecha_final_pago_convenio_edicion = $('#fecha_final_pago_convenio_edicion').val();
        var observaciones_edicion_convenio = $('#observaciones_edicion_convenio').val();
        var convenio_infinito = $('#convenio_infinito_edicion').is(':checked') ? 1 : 0;

        var valido = 1;
        var mensaje = '';

        if(nombre_convenio_edicion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar nombre de convenio</li>';
        }
        if(tipo_convenio_edicion == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar tipo de convenio</li>';
        }
        if(lugar_atencion_edicion == 0){
            valido = 0;
            mensaje += '<li>Debe seleccionar lugar de atención</li>';
        }
        if(fecha_inicial_pago_convenio_edicion == ''){
            valido = 0;
            mensaje += '<li>Debe ingresar fecha inicial</li>';
        }
        if(fecha_final_pago_convenio_edicion == '' && convenio_infinito == 0){
            valido = 0;
            mensaje += '<li>Debe ingresar fecha final o marcar como indefinido</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'div',
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: 'error',
                button: 'Aceptar'
            });
            return false;
        }

        // AJAX para pestaña Empresas
        const editarUrl = window.convenioEditarUrl || "{{ route('adm_cm.editar_convenio') }}";
        $.ajax({
            url: editarUrl,
            type: 'POST',
            data: {
                id_convenio_institucion: id_convenio_institucion,
                nombre_convenio_edicion: nombre_convenio_edicion,
                tipo_convenio_edicion: tipo_convenio_edicion,
                porcentaje_dcto_edicion: porcentaje_dcto_edicion,
                lugar_atencion_edicion: lugar_atencion_edicion,
                fecha_inicio: fecha_inicial_pago_convenio_edicion,
                fecha_fin: fecha_final_pago_convenio_edicion,
                observaciones_edicion_convenio: observaciones_edicion_convenio,
                convenio_infinito: convenio_infinito,
                _token: "{{ csrf_token() }}",
            },
            success: function(data){
                console.log(data);
                if(data.estado == 1){
                    swal({
                        title: 'Exito',
                        text: data.msj,
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#editarConvenioInstitucion').modal('hide');
                    if (window.convenioEditarReload) {
                        location.reload();
                    } else if ($('#card_body_convenios_institucion').length && data.v) {
                        $('#card_body_convenios_institucion').empty();
                        $('#card_body_convenios_institucion').html(data.v);
                    }
                }else{
                    swal({
                        title: 'Error',
                        text: data.msj,
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            },
            error: function(data){
                alert('Error al editar convenio');
            }
        });
    }
    // Si es pestaña de Instituciones o Convenio Personal Profesional o Convenio Institución Isapres
    else if(tabActiva === 'pills-instituciones-edicion' || tabActiva === 'pills-convenio_personal_profesional' || tabActiva === 'pills-convenio_institucion_isapres'){
        // Recopilar convenios seleccionados
        var convenios = '';
        for (let i = 1; i <= 12; i++) {
            if ($('#convenio_editar_' + i).prop('checked')) {
                convenios += $('#text_convenio_editar_' + i).text().trim() + ',';
            }
        }

        var tipo_atencion = $('#tipo_atencion_editar').val();
        var valor = $('#valor_editar').val();
        var valor_garantia = $('#valor_garantia_editar').val();
        var fecha_inicial = $('#fecha_inicial_inst_edicion').val();
        var fecha_final = $('#fecha_final_inst_edicion').val();
        var convenio_infinito = $('#convenio_infinito_inst_edicion').is(':checked') ? 1 : 0;
        var porcentaje = $('#porcentaje_editar').val();
        var copago_fonasa = $('#copago_fonasa_editar').val();
        var bono_fonasa = $('#bono_fonasa_editar').val();
        var lugar_atencion = $('#lugar_atencion_inst_edicion').val();

        var valido = 1;
        var mensaje = '';

        if(convenios == ''){
            valido = 0;
            mensaje += '<li>Debe seleccionar al menos un convenio</li>';
        }

        if(valido == 0){
            swal({
                title: 'Error',
                content:{
                    element: 'div',
                    attributes:{
                        innerHTML: mensaje
                    }
                },
                icon: 'error',
                button: 'Aceptar'
            });
            return false;
        }

        // AJAX para pestaña Instituciones
        const editarUrl = window.convenioEditarUrl || "{{ route('adm_cm.editar_convenio') }}";
        $.ajax({
            url: editarUrl,
            type: 'POST',
            data: {
                id_convenio: id_convenio_institucion,
                convenios: convenios,
                tipo_atencion: tipo_atencion,
                valor: valor,
                valor_garantia: valor_garantia,
                fecha_inicio: fecha_inicial,
                fecha_fin: fecha_final,
                convenio_infinito: convenio_infinito,
                porcentaje: porcentaje,
                copago_fonasa: copago_fonasa,
                bono_fonasa: bono_fonasa,
                lugar_atencion: lugar_atencion,
                _token: "{{ csrf_token() }}",
            },
            success: function(data){
                console.log(data);
                if(data.estado == 1){
                    swal({
                        title: 'Exito',
                        text: data.msj,
                        icon: 'success',
                        button: 'Aceptar'
                    });
                    $('#editarConvenioInstitucion').modal('hide');
                    location.reload();
                }else{
                    swal({
                        title: 'Error',
                        text: data.msj,
                        icon: 'error',
                        button: 'Aceptar'
                    });
                }
            },
            error: function(data){
                alert('Error al editar convenio');
            }
        });
    }
}

function guardar_edicion_convenio_ffa(){
    console.log('Guardar edición convenio FFAA');
    var id_convenio = $('#id_convenio_profesional').val();
    if(id_convenio == '' || id_convenio == undefined){
        id_convenio = $('#id_convenio_institucion').val();
    }

    // Recopilar convenios FFAA seleccionados
    var convenios = '';
    for (let i = 1; i <= 10; i++) {
        if ($('#convenio_editar_ffa' + i).prop('checked')) {
            convenios += $('#convenio_editar_ffa' + i).next('label').text().trim() + ',';
        }
    }

    var tipo_atencion = $('#tipo_atencion_ffa_editar').val();
    var fecha_inicial = $('#fecha_inicial_ffa_edicion').val();
    var fecha_final = $('#fecha_final_ffa_edicion').val();
    var convenio_infinito = $('#convenio_infinito_ffa_edicion').is(':checked') ? 1 : 0;
    var valor = $('#valor_ffa_editar').val();
    var valor_garantia = $('#valor_garantia_ffa_editar').val();
    var porcentaje = $('#porcentaje_ffa_editar').val();
    var copago_fonasa = $('#copago_fonasa_ffa_editar').val();
    var bono_fonasa = $('#bono_fonasa_ffa_editar').val();
    var lugar_atencion = $('#lugar_atencion_ffa_edicion').val();

    var valido = 1;
    var mensaje = '';

    if(convenios == ''){
        valido = 0;
        mensaje += '<li>Debe seleccionar al menos un convenio</li>';
    }

    if(valido == 0){
        swal({
            title: 'Error',
            content:{
                element: 'div',
                attributes:{
                    innerHTML: mensaje
                }
            },
            icon: 'error',
            button: 'Aceptar'
        });
        return false;
    }

    // AJAX para pestaña FFAA
    const editarUrl = window.convenioEditarUrl || "{{ route('adm_cm.editar_convenio') }}";
    $.ajax({
        url: editarUrl,
        type: 'POST',
        data: {
            id_convenio: id_convenio,
            convenios: convenios,
            tipo_atencion: tipo_atencion,
            fecha_inicio: fecha_inicial,
            fecha_fin: fecha_final,
            convenio_infinito: convenio_infinito,
            valor: valor,
            valor_garantia: valor_garantia,
            porcentaje: porcentaje,
            copago_fonasa: copago_fonasa,
            bono_fonasa: bono_fonasa,
            lugar_atencion: lugar_atencion,
            _token: "{{ csrf_token() }}",
        },
        success: function(data){
            console.log(data);
            if(data.estado == 1){
                swal({
                    title: 'Exito',
                    text: data.msj,
                    icon: 'success',
                    button: 'Aceptar'
                });
                $('#editarConvenioInstitucion').modal('hide');
                location.reload();
            }else{
                swal({
                    title: 'Error',
                    text: data.msj,
                    icon: 'error',
                    button: 'Aceptar'
                });
            }
        },
        error: function(data){
            alert('Error al editar convenio FFAA');
        }
    });
}

function guardar_edicion_convenio_especial(){
    console.log('Guardar edición convenio especial');
    var id_convenio = $('#id_convenio_institucion').val();

    var nombre_convenio = $('#nombre_convenio_especial_editar').val();
    var tipo_convenio = $('#tipo_convenio_especial_edicion').val();
    var porcentaje_dcto = $('#porcentaje_dcto_especial_edicion').val();
    var tipo_convenio_institucion = $('#tipo_convenio_institucion_especial_edicion').val();
    var fecha_inicial = $('#fecha_inicial_especial_edicion').val();
    var fecha_final = $('#fecha_final_especial_edicion').val();
    var convenio_infinito = $('#convenio_infinito_especial_edicion').is(':checked') ? 1 : 0;
    var productos_convenio = $('#productos_convenio_especial_editar').val();
    var rut_representante = $('#rut_representante_especial_editar').val();
    var nombre_representante = $('#nombre_representante_especial_editar').val();
    var telefono_representante = $('#telefono_representante_especial_editar').val();
    var email_representante = $('#email_representante_especial_editar').val();
    var direccion_representante = $('#direccion_representante_especial_editar').val();
    var observaciones = $('#observaciones_especial_edicion').val();

    var valido = 1;
    var mensaje = '';

    if(nombre_convenio == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar nombre de convenio</li>';
    }
    if(tipo_convenio == 0){
        valido = 0;
        mensaje += '<li>Debe seleccionar tipo de convenio</li>';
    }
    if(fecha_inicial == ''){
        valido = 0;
        mensaje += '<li>Debe ingresar fecha inicial</li>';
    }
    if(fecha_final == '' && convenio_infinito == 0){
        valido = 0;
        mensaje += '<li>Debe ingresar fecha final o marcar como indefinido</li>';
    }

    if(valido == 0){
        swal({
            title: 'Error',
            content:{
                element: 'div',
                attributes:{
                    innerHTML: mensaje
                }
            },
            icon: 'error',
            button: 'Aceptar'
        });
        return false;
    }

    // AJAX para pestaña Especiales
    const editarUrl = window.convenioEditarUrl || "{{ route('adm_cm.editar_convenio') }}";
    $.ajax({
        url: editarUrl,
        type: 'POST',
        data: {
            id_convenio: id_convenio,
            nombre_convenio: nombre_convenio,
            tipo_convenio: tipo_convenio,
            porcentaje_dcto: porcentaje_dcto,
            tipo_convenio_institucion: tipo_convenio_institucion,
            fecha_inicio: fecha_inicial,
            fecha_fin: fecha_final,
            convenio_infinito: convenio_infinito,
            productos_convenio: productos_convenio,
            rut_representante: rut_representante,
            nombre_representante: nombre_representante,
            telefono_representante: telefono_representante,
            email_representante: email_representante,
            direccion_representante: direccion_representante,
            observaciones: observaciones,
            tipo_tab: 'especiales',
            _token: "{{ csrf_token() }}",
        },
        success: function(data){
            console.log(data);
            if(data.estado == 1){
                swal({
                    title: 'Exito',
                    text: data.msj,
                    icon: 'success',
                    button: 'Aceptar'
                });
                $('#editarConvenioInstitucion').modal('hide');
                location.reload();
            }else{
                swal({
                    title: 'Error',
                    text: data.msj,
                    icon: 'error',
                    button: 'Aceptar'
                });
            }
        },
        error: function(data){
            alert('Error al editar convenio especial');
        }
    });
}

</script>
