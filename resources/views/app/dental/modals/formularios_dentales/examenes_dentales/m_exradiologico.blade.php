<div id="modal_examenradiologico" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_examenradiologico" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_adjuntar_examen">
                    Examen radiológico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_radiologico_validacion">
                    <div class="col-sm-6 mt-4">
                        <div class="form-group fill">
                            <script>
                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                    "Octubre", "Noviembre", "Diciembre");
                                var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                var f = new Date();

                                document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                    .getFullYear());
                            </script>
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label">Nº de Orden</label>
                                <input type="text" name="nro_orden" id="nro_orden" type="text"
                                    value="{{ $examen_radiologico }} " class="form-control form-control-sm" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo de Examen Radiologico</label>
                                <select class="form-control form-control-sm" name="tipo_examen_radiologico"
                                    id="tipo_examen_radiologico">
                                    <option value="">Seleccione una opción</option>
                                    <optgroup label="Radiología Intraoral" class="Radiología Intraoral">
                                        <option value="1">RX PERIAPICAL PIEZA</option>
                                        <option value="2">RX PERIAPICAL TOTAL</option>
                                        <option value="3">RX PERIAPICAL GRUPO II</option>
                                        <option value="4">RX PERIAPICAL GRUPO V</option>
                                        <option value="5">RX BITE WING BILATERAL</option>
                                        <option value="6">RX BITE WING DER O IZQ</option>
                                    </optgroup>
                                    <optgroup label="Radiología Extraoral" class="Radiología Extraoral">
                                        <option value="7">RX PANORAMICA DIGITAL</option>
                                        <option value="8">TELERRADIOGRAFIA LATERAL</option>
                                        <option value="9">TELERRADIOGRAFIA FRONTAL</option>
                                        <option value="10">ANALISIS CEFALOMETRICO</option>
                                        <option value="11">ORTHO PACK (PANO-TELE -1ANALISIS)</option>
                                        <option value="12">RX MANO (EDAD OSEA)</option>
                                    </optgroup>
                                    <optgroup label="Scanner (TAC)" class="Scanner (TAC)">
                                        <option value="13">SCANNER MAXILAR SUPERIOR</option>
                                        <option value="14">SCANNER MAXILAR INFERIOR</option>
                                        <option value="15">SCANNER BIMAXILAR</option>
                                        <option value="16">SCANNER ZONA PIEZA</option>
                                        <option value="17">SCANNER 3D ATM (BA-BC)</option>
                                        <option value="18">SCANNER 3D ATM BA-BC DERECHO</option>
                                        <option value="19">SCANNER 3D ATM BA-BC IZQUIERDO</option>
                                        <option value="20">SCANNER 3D ATM BILATERAL BC</option>
                                        <option value="21">SCANNER 3D ATM BILATERAL BA</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="submit" onclick="agregar_examen_radiologico()"
                                class="btn btn-success btn-sm float-right">
                                <i class="fa fa-plus"></i> Agregar Examen</button>
                        </div>

                    </div>
                </form>
                <form id="form_radiologico" action="{{ route('dental.registrar_examen_radiologico') }}" method="post">
                    @csrf
                    <input type="hidden" name="radiologicos" id="radiologicos">
                    <input type="hidden" name="ficha_id" id="radiologicos"
                        value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                    <input type="hidden" name="paciente_radiologico" id="paciente_radiologico"
                        value="{{ $paciente->id }}">
                    <div class="form-row">




                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table id="examen_radiologico" class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº Orden</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <!--Cierre Tabla-->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="reset_form('form_radiologico_validacion')"
                                class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <input type="submit" id="btn_registrar_examen_radiologico" style="display:none;"
                                class="btn btn-info" onclick="registrar_examen_radiologico()" value="GUARDAR">


                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
