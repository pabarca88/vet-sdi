<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-md-12">
                <div class="row mt-3 mb-0">
                    <div class="col-md-8 d-inline float-left mt-0 mb-1 pb-0">
                        <h6 class="f-16 text-c-blue">Sala de hospitalización</h6>
                    </div>
                    <div class="col-md-4 float-right d-inline">
                        <div class="alert alert-primary my-0 py-0 px-0" role="alert">
                          <p class="p-10 d-inline font-weight-bolder">Servicio: </p><p class="p-10 d-inline">Nombre del servicio</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row pt-0 mb-3">
                    <div class="col-md-2">
                        <h6 class="text-c-blue">Evoluciones</h6>
                    </div>
                    <div class="col-md-10 float-right">
                        <div class="btn-toolbar d-flex justify-content-end" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                        <button type="button" class="btn btn-outline-success" onclick="i_medicamento();"><i class="feather icon-file-plus"></i>Recetario</button>
                        <button type="button" class="btn btn-outline-success" onclick="i_examen();"><i class="feather icon-file-plus"></i>Examen</button>
                        <button type="button" class="btn btn-outline-success" onclick="m_inter();"><i class="feather icon-user"></i>Interconsulta</button>
                        <button type="button" class="btn btn-primary"><i class="feather icon-plus"></i>Nueva evolución</button>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--Evoluciones-->
                    <div class="col-sm-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="text-secondary">00/00/000</h6>
                                    <h6 class="text-secondary">00:00 hrs</h6>
                                </div>
                                <div class="form-group col-md-10">
                                    <label class="floating-label">Evolución</label>
                                    <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <h6 class="text-secondary">00/00/000</h6>
                                    <h6 class="text-secondary">00:00 hrs</h6>
                                </div>
                                <div class="form-group col-md-10">
                                    <label class="floating-label">Evolución</label>
                                    <textarea class="form-control form-control-sm" rows="2" onfocus="this.rows=4" onblur="this.rows=3;"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <h6 class="text-c-blue">Resumen de evoluciones</h6>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control form-control-sm" rows="3" onfocus="this.rows=5" onblur="this.rows=4;"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-info">Guardar formulario</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>