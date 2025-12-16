<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
        <h6 class="text-c-blue f-20">Historial de controles</h6>
    </div>
</div>
<div class="form-row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
        <div class="card-informacion">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div style="overflow-x:auto;">
                            <table id="tabla_planes" class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Plan N°</th>
                                        <th>Fecha inicio</th>

                                        <th>Sesiones</th>
                                        <th>Estado</th>
                                        <th>Controles</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                            <hr>

                            <h5>Controles del Plan Seleccionado</h5>
                            <table id="tabla_controles" class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Sesión</th>
                                        {{-- <th>Peso</th> --}}
                                        <th>Trabajo en</th>
                                        <th>Objetivo</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
