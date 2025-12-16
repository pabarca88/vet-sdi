<div id="hemorragias_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="hemorragias_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes hemorragicos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                    </div>
                        <h6 id="ant_2" onclick="abrir_div('formulario_2');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>

                </div>
                <div class="row py-2" id="formulario_2" style="display:none;">
                    <div class="col-md-12">
                        <form id="form_antecedente_hemorragia" method="POST"
                            action="{{ route('dental.registrar_antecedente_hemorragia_ficha_dental') }}">

                            @csrf
                            <input type="hidden" name="ficha_id_antecedente_hemorragia_atencion_dental"
                                id="ficha_id_antecedente_hemorragia_atencion_dental">
                                {{--  value=" @if ($ficha != null) {{ $ficha->id }} @endif">  --}}
                            <input type="hidden" name="paciente_antecedente_hemorragia_atencion_dental"
                                id="paciente_antecedente_hemorragia_atencion_dental" value="{{ $paciente->id }}">

                            <div class="form-row">
                                <div class="form-group fill col-sm-3">
                                    <script>
                                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                            "Octubre", "Noviembre", "Diciembre");
                                        var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                        var f = new Date();

                                        document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                            .getFullYear());
                                    </script>
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label">Procedimiento</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="procedimiento_hemorragia_ficha_atencion"
                                        id="procedimiento_hemorragia_ficha_atencion">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label">Lugar de ocurrencia</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="lugar_hemorragia_ficha_atencion" id="lugar_hemorragia_ficha_atencion">
                                </div>
                                <div class="form-group fill col-sm-3">
                                    <label class="floating-label">Rut del responsable</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="rut_hemorragia_ficha_atencion" id="rut_hemorragia_ficha_atencion">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group fill col-sm-8">
                                    <label class="floating-label">Tratamientos o complicaciones</label>
                                    <input type="text" class="form-control form-control-sm"
                                        name="tratamiento_hemorragia_ficha_atencion"
                                        id="tratamiento_hemorragia_ficha_atencion">
                                </div>
                                <div class="form-group fill col-sm-4">
                                    <button type="submit" class="btn btn-success btn-sm btn-block">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="hemorragias_dental"
                                class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Procedimiento</th>
                                        <th class="text-center align-middle">Lugar de ocurrencia</th>
                                        <th class="text-center align-middle">Rut responsable</th>
                                        <th class="text-center align-middle">Otros tratamientos</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($hemorragias_paciente))
                                        @foreach ($hemorragias_paciente as $hem_pac)
                                            <tr>
                                                <td class="text-center align-middle">{{ $hem_pac->created_at }}</td>
                                                <td class="text-center align-middle">{{ $hem_pac->procedimiento }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $hem_pac->id_lugar_atencion }}
                                                </td>
                                                <td class="text-center align-middle">{{ $hem_pac->rut_responsable }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $hem_pac->detalle_tratamiento }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function hemorragia_dental() {
        $('#hemorragias_modal').modal('show');
    }
</script>
