<div id="modal_fractura" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_info3"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> ANTECEDENTES FRACTURAS PATOLÓGICAS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <!--Card Información Básica-->
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                <h5 class="mb-0 text-white"> Agregar Antecedentes Con Hemorrágico </h5>

                            </div>

                            <div class="card-body ">
                                <form id="form_antecedente_fractura" method="POST"
                                    action="{{ route('dental.registrar_antecedente_fractura_ficha_dental') }}">

                                    @csrf
                                    <input type="hidden" name="ficha_id_antecedente_fractura_atencion_dental"
                                        id="ficha_id_antecedente_fractura_atencion_dental"
                                        value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                                    <input type="hidden" name="paciente_antecedente_fractura_atencion_dental"
                                        id="paciente_antecedente_fractura_atencion_dental"
                                        value="{{ $paciente->id }}">

                                    <div class="col-sm-6 mt-4">
                                        <div class="form-group row">
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
                                        <div class="form-group col-md-12 mx-auto">
                                            <label class="floating-label">Procedimiento</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="procedimiento_fractura_ficha_atencion"
                                                id="procedimiento_fractura_ficha_atencion">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mx-auto">
                                            <label class="floating-label">Lugar de Ocurrencia</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="lugar_fractura_ficha_atencion" id="lugar_fractura_ficha_atencion">
                                        </div>
                                        <div class="form-group col-md-6 mx-auto">
                                            <label class="floating-label">Rut </label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="rut_fractura_ficha_atencion" id="rut_fractura_ficha_atencion">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mx-auto">
                                            <label class="floating-label">Tratamientos,
                                                Complicaciones y Otros</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="tratamiento_fractura_ficha_atencion"
                                                id="tratamiento_fractura_ficha_atencion">
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label"></label>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="button" onclick="reset_form('form_antecedente_fractura')"
                                                data-dismiss="modal" class="btn btn-danger mr-2">Cancelar</button>
                                            <input type="submit" class="btn btn-info" value="Guardar Incidente">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--Cierre: (Editar)Datos Personales-->
                        </div>
                        <!--Cierre: Card Datos Personales-->
                    </div>
                </div>

                <table id="tabla_antecedentes_fractura" class="table table-sm">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Procedimiento</th>
                            <th class="text-center align-middle">Lugar Ocurrencia</th>
                            <th class="text-center align-middle">Rut</th>
                            <th class="text-center align-middle">Tratamientos y complicaciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>


            <div class="modal-footer">
                <button type="button" onclick="reset_form('form_antecedente_fractura')" class="btn btn-success"
                    data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
