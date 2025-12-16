<div id="m_rx_cardio" class="modal fade" role="dialog" aria-labelledby="m_rx_cardio" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Estudio Radiológico Cardiologia</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal"  aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                   <div class="form-row mt-1">
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="ex-func-bronco">Exámenes Funcionales</label>
                            <select class="js-example-basic-multiple select2" name="examen_rx" id="examen_rx" multiple="multiple">
                                <option value="1">17 01 018 &nbsp;  |  &nbsp;  REGISTRO ECOARTERIAL O ECOVENOSO PERIFÉRICO	</option>
                                <option value="2">17 01 019 4  &nbsp;  |  &nbsp;  CINECORONARIOGRAFÍA DERECHA Y/O IZQUIERDA 	</option>
                                <option value="3">17 01 020 4  &nbsp;  |  &nbsp  VENTRICULOGRAFÍA DERECHA </option>
                                <option value="4">17 01 021 4  &nbsp;  |  &nbsp;VENTRICULOGRAFÍA IZQUIERDA</option>
                                <option value="5">17 01 022 &nbsp;  |  &nbsp  AORTOGRAFÍA, EN ADULTOS O NIÑOS</option>
                                <option value="6">17 01 023&nbsp;  |  &nbsp;   ARTERIOGRAFÍA DE EXTREMIDADES </option>
                                <option value="7">17 01 061&nbsp;  |  &nbsp;  ARTERIOGRAFÍA SELECTIVA O SUPERSELECTIVA PULMONAR EN ADULTOS O NIÑOS	</option>
                                <option value="8"> 17 01 062  &nbsp;  |  &nbsp;ARTERIOGRAFÍA SELECTIVA O SUPERSELECTIVA RENAL EN ADULTOS O NIÑOS	</option>
                                <option value="9">17 01 063 &nbsp;  |  &nbsp;  ARTERIOGRAFÍA SELECTIVA O SUPERSELECTIVA TRONCO CELÍACO EN ADULTOS O NIÑOS	</option>
                                <option value="10">17 01 064 &nbsp;  |  &nbsp;  ARTERIOGRAFÍA SELECTIVA O SUPERSELECTIVA ARTERIA GLÚTEA EN ADULTOS O NIÑOS	 </option>
                                <option value="11">17 01 065 &nbsp;  |  &nbsp; ARTERIOGRAFÍA SELECTIVA O SUPERSELECTIVA HIPOGÁSTRICA EN ADULTOS O NIÑOS</option>
                                <option value="12">17 01 066  &nbsp;  |  &nbsp; ARTERIOGRAFÍA SELECTIVA O SUPERSELECTIVA HEPÁTICA EN ADULTOS O NIÑOS		</option>
                                <option value="13">17 01 067&nbsp;  |  &nbsp;  ARTERIOGRAFÍA SELECTIVA O SUPERSELECTIVA MESENTÉRICA EN ADULTOS O NIÑOS	</option>
                                <option value="14">17 01 068 &nbsp;  |  &nbsp; ARTERIOGRAFÍA SELECTIVA O SUPERSELECTIVA ARTERIA LUMBAR EN ADULTOS O NIÑOS </option>
                                <option value="15"17 01 069 &nbsp;  |  &nbsp;  ARTERIOGRAFÍA SELECTIVA O SUPERSELECTIVA ARTERIA VESICAL EN ADULTOS O NIÑOS	</option>
                                <option value="16">17 01 026 &nbsp;  |  &nbsp;  FLEBOGRAFÍA DE CADA EXTREMIDAD	</option>
                                <option value="17">04 05 009&nbsp;  |  &nbsp;  RESONANCIA MAGNÉTICA DE  CORAZÓN</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Diagnóstico</label>
                            <input type="text" class="form-control" data-input_igual="descripcion_hipotesis,diagnostico_especialidad,diagnostico_comunes,diagnostico_endoscopico" name="diagnostico_rx" id="diagnostico_rx" onchange="cargarIgual('diagnostico_rx');" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="observaciones_rx" id="observaciones_rx"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right" onclick="guardar_examenes(2)">
                            <i class="fa fa-plus"></i> Agregar examen</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs" id="table_examen_2">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Examen</th>
                                            <th class="text-center align-middle">Diagnóstico</th>
                                            <th class="text-center align-middle">Observaciones</th>
                                            <th class="text-center align-middle">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($examenes_plan_tratamiento_rx) && $examenes_plan_tratamiento_rx->count() > 0)
                                            @foreach ($examenes_plan_tratamiento_rx as $e)
                                                @foreach (json_decode($e->examenes, true) as $examen_nombre)
                                                    <tr>
                                                        {{-- Fecha --}}
                                                        <td class="text-center align-middle">
                                                            {{ \Carbon\Carbon::parse($e->created_at)->format('d-m-Y H:i') }}
                                                        </td>

                                                        {{-- Examen --}}
                                                        <td class="text-left align-middle">
                                                            • {{ $examen_nombre }}
                                                        </td>

                                                        {{-- Diagnóstico --}}
                                                        <td class="text-left align-middle">
                                                            {{ $e->diagnostico }}
                                                        </td>

                                                        {{-- Observaciones --}}
                                                        <td class="text-left align-middle">
                                                            {{ $e->observaciones }}
                                                        </td>

                                                        {{-- Acciones --}}
                                                        <td class="text-center align-middle">
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm mb-1"
                                                                onclick="eliminarExamen('{{ $e->id }}',2, '{{ $examen_nombre }}')"
                                                            ><i class="fas fa-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm" onclick="generarPDFtipoExamen(2)">Generar PDF</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" onclick="cerrarsol_rx_cardio();" data-bs-dismiss="modal" >Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<style>
    .select2-dropdown{
        z-index: 9999999999999 !important;
    }
</style>

<script>

    function sol_rx_cardio()
    {
        $('#m_rx_cardio').modal('show');
    }
    function cerrarsol_rx_cardio() {
        $('#m_rx_cardio').modal ('hide');
      }
function generarPDFtipoExamen(tipo) {
            let id_ficha_atencion = $('#id_fc').val(); // input hidden en tu HTML
            let auto = 1; // o el valor real que quieras enviar
            let url = "{{ route('pdf.orden_examenes_tipo_examen') }}";

            Fancybox.show(
                [{
                    src: "{{ route('pdf.orden_examenes_tipo_examen') }}?id=" + id_ficha_atencion + "&tipo=" + tipo,
                    type: "iframe",
                    preload: false,
                }, ]
            );
    }
</script>
{{--  <link rel="stylesheet"  href="{{ asset('css\plugins\select2.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
<!-- select2 Js -->
<script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>
<!-- form-select-custom Js -->
<script src="{{ asset('js/pages/form-select-custom.js') }}"></script>
<!-- select2 css -->  --}}
