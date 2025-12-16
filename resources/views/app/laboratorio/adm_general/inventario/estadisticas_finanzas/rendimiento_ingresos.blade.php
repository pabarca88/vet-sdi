
    <div class="card-body">
        <h4 class="card-title font-weight-bold">Estadísticas y Finanzas</h4>

        <p class="card-text">Aquí puedes ver las estadísticas financieras relacionadas con el inventario del laboratorio.</p>
        <!-- Formulario de filtros generales -->
        <form method="GET" action="" class="mb-4">
            <div class="form-row align-items-end">
                <div class="form-group col-md-3">
                    <label for="fecha_inicio">Fecha inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ request('fecha_inicio') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="fecha_final">Fecha final</label>
                    <input type="date" class="form-control" id="fecha_final" name="fecha_final" value="{{ request('fecha_final') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="institucion">Institución</label>
                    <select class="form-control" id="institucion" name="institucion">
                        <option value="">Todas</option>
                        @foreach($sucursales ?? [] as $inst)
                            <option value="{{ $inst->id }}" {{ request('institucion') == $inst->id ? 'selected' : '' }}>{{ $inst->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="profesional">Profesional</label>
                    <select class="form-control" id="profesional" name="profesional">
                        <option value="">Todos</option>
                        @foreach($profesionales ?? [] as $prof)
                            <option value="{{ $prof->id }}" {{ request('profesional') == $prof->id ? 'selected' : '' }}>{{ $prof->nombre }} {{ $prof->apellido_uno }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
        <!-- Nav pills -->
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-totales-tab" data-toggle="pill" href="#pills-totales" role="tab" aria-controls="pills-totales" aria-selected="true">Totales</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-agenda-tab" data-toggle="pill" href="#pills-agenda" role="tab" aria-controls="pills-agenda" aria-selected="false">Agenda</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-ventas-tab" data-toggle="pill" href="#pills-ventas" role="tab" aria-controls="pills-ventas" aria-selected="false">Ventas</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-profesional-tab" data-toggle="pill" href="#pills-profesional" role="tab" aria-controls="pills-profesional" aria-selected="false">Profesional</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-tratamientos-tab" data-toggle="pill" href="#pills-tratamientos" role="tab" aria-controls="pills-tratamientos" aria-selected="false">Tratamientos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-productos-tab" data-toggle="pill" href="#pills-productos" role="tab" aria-controls="pills-productos" aria-selected="false">Productos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-comision-tab" data-toggle="pill" href="#pills-comision" role="tab" aria-controls="pills-comision" aria-selected="false">Comisión</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-comisiones-tab" data-toggle="pill" href="#pills-comisiones" role="tab" aria-controls="pills-comisiones" aria-selected="false">Comisiones</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-comisionatencion-tab" data-toggle="pill" href="#pills-comisionatencion" role="tab" aria-controls="pills-comisionatencion" aria-selected="false">Comisión por atención</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-consolidado-tab" data-toggle="pill" href="#pills-consolidado" role="tab" aria-controls="pills-consolidado" aria-selected="false">Consolidado</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-boletas-tab" data-toggle="pill" href="#pills-boletas" role="tab" aria-controls="pills-boletas" aria-selected="false">Boletas</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-bonos-tab" data-toggle="pill" href="#pills-bonos" role="tab" aria-controls="pills-bonos" aria-selected="false">Bonos</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-retiros-tab" data-toggle="pill" href="#pills-retiros" role="tab" aria-controls="pills-retiros" aria-selected="false">Retiros</a>
            </li>
            {{-- <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-excedentes-tab" data-toggle="pill" href="#pills-excedentes" role="tab" aria-controls="pills-excedentes" aria-selected="false">Venta de excedentes</a>
            </li> --}}
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-pacientes-tab" data-toggle="pill" href="#pills-pacientes" role="tab" aria-controls="pills-pacientes" aria-selected="false">Pacientes</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-gastos-tab" data-toggle="pill" href="#pills-gastos" role="tab" aria-controls="pills-gastos" aria-selected="false">Gastos</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-totales" role="tabpanel" aria-labelledby="pills-totales-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Totales</h5>
                        <p>Resumen general de ingresos, egresos y balance.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_totales"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <ul>
                    <li>Ingresos totales: <strong>$0</strong></li>
                    <li>Egresos totales: <strong>$0</strong></li>
                    <li>Balance: <strong>$0</strong></li>
                </ul>
            </div>
            <div class="tab-pane fade" id="pills-agenda" role="tabpanel" aria-labelledby="pills-agenda-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Agenda</h5>
                        <p>Estadísticas de citas agendadas, realizadas y canceladas.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_agenda"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <div id="grafico_agenda"></div>
            </div>
            <div class="tab-pane fade" id="pills-ventas" role="tabpanel" aria-labelledby="pills-ventas-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Ventas</h5>
                        <p>Detalle de ventas realizadas en el periodo.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_ventas"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <div id="grafico_ventas"></div>
            </div>
            <div class="tab-pane fade" id="pills-profesional" role="tabpanel" aria-labelledby="pills-profesional-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Profesional</h5>
                        <p>Estadísticas por profesional: atenciones, ingresos y comisiones.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_profesional"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <div id="grafico_profesional"></div>
            </div>
            <div class="tab-pane fade" id="pills-tratamientos" role="tabpanel" aria-labelledby="pills-tratamientos-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Tratamientos</h5>
                        <p>Estadísticas de tratamientos realizados y sus ingresos.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_tratamientos"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <div id="grafico_tratamientos"></div>
            </div>
            <div class="tab-pane fade" id="pills-productos" role="tabpanel" aria-labelledby="pills-productos-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Productos</h5>
                        <p>Estadísticas de productos vendidos y stock.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_productos"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <div id="grafico_productos"></div>
            </div>
            <div class="tab-pane fade" id="pills-comision" role="tabpanel" aria-labelledby="pills-comision-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Comisión</h5>
                        <p>Detalle de comisiones individuales.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_comision"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                    <div id="grafico_comision"></div>
            </div>
            <div class="tab-pane fade" id="pills-comisiones" role="tabpanel" aria-labelledby="pills-comisiones-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Comisiones</h5>
                        <p>Resumen de todas las comisiones pagadas.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_comisiones"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <div id="grafico_comisiones"></div>
            </div>
            <div class="tab-pane fade" id="pills-comisionatencion" role="tabpanel" aria-labelledby="pills-comisionatencion-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Comisión por atención</h5>
                        <p>Detalle de comisiones por cada atención realizada.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_comisionatencion"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <div id="grafico_comision_atencion"></div>
            </div>
            {{-- <div class="tab-pane fade" id="pills-consolidado" role="tabpanel" aria-labelledby="pills-consolidado-tab">
                <h5>Consolidado</h5>
                <p>Consolidado financiero general.</p>
                <ul>
                    <li>Ingresos consolidados: <strong>$0</strong></li>
                    <li>Egresos consolidados: <strong>$0</strong></li>
                </ul>
            </div> --}}
            <div class="tab-pane fade" id="pills-boletas" role="tabpanel" aria-labelledby="pills-boletas-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Boletas</h5>
                        <p>Estadísticas de boletas emitidas.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_boletas"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <ul>
                    <li>Boletas emitidas: <strong>0</strong></li>
                    <li>Monto total: <strong>$0</strong></li>
                </ul>
            </div>
            <div class="tab-pane fade" id="pills-bonos" role="tabpanel" aria-labelledby="pills-bonos-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Bonos</h5>
                        <p>Estadísticas de bonos utilizados.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_bonos"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <div id="grafico_bonos"></div>
            </div>
            <div class="tab-pane fade" id="pills-retiros" role="tabpanel" aria-labelledby="pills-retiros-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Retiros</h5>
                        <p>Detalle de retiros realizados.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_retiros"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <ul>
                    <li>Retiros realizados: <strong>0</strong></li>
                    <li>Monto total: <strong>$0</strong></li>
                </ul>
            </div>
            {{-- <div class="tab-pane fade" id="pills-excedentes" role="tabpanel" aria-labelledby="pills-excedentes-tab">
                <h5>Venta de excedentes</h5>
                <p>Estadísticas de ventas de excedentes.</p>
                <ul>
                    <li>Ventas de excedentes: <strong>0</strong></li>
                    <li>Monto total: <strong>$0</strong></li>
                </ul>
            </div> --}}
            <div class="tab-pane fade" id="pills-pacientes" role="tabpanel" aria-labelledby="pills-pacientes-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Pacientes</h5>
                        <p>Estadísticas de pacientes atendidos.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_pacientes"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <ul>
                    <li>Pacientes atendidos: <strong>0</strong></li>
                    <li>Nuevos pacientes: <strong>0</strong></li>
                </ul>
                <div id="grafico_pacientes"></div>
            </div>
            <div class="tab-pane fade" id="pills-gastos" role="tabpanel" aria-labelledby="pills-gastos-tab">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5>Gastos</h5>
                        <p>Estadísticas de gastos realizados.</p>
                    </div>
                    <button class="btn btn-success btn-sm" id="excel_gastos"><i class="feather icon-download"></i> Exportar Excel</button>
                </div>
                <ul>
                    <li>Pacientes atendidos: <strong>0</strong></li>
                    <li>Nuevos pacientes: <strong>0</strong></li>
                </ul>
                <div id="grafico_gastos"></div>
            </div>
        </div>
    </div>


