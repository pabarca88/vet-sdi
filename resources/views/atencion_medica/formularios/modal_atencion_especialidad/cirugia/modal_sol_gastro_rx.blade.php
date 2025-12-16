<div id="m_rx_gastro" class="modal fade" role="dialog" aria-labelledby="m_rx_gastro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Estudio Radiológico</h5>
                <button type="button" class="close text-white" data-dismiss="modal"  aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                   <div class="form-row mt-1">
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="ex-func-bronco">Exámenes Funcionales</label>
                            <select class="js-example-basic-multiple select2" name="examen_rx" id="examen_rx" multiple="multiple">
                                <option value="1">04 04 003  &nbsp;  |  &nbsp; ECOGRAFÍA ABDOMINAL </option>
                                <option value="2">04 03 103  &nbsp;  |  &nbsp; TOMOGRAFÍA COMPUTARIZADA ANGIO DE ABDOMEN	</option>
                                <option value="3">04 03 023  &nbsp;  |  &nbsp TOMOGRAFÍA COMPUTARIZADA DE COLONOSCOPÍA VIRTUAL. </option>
                                <option value="4">04 03 020 &nbsp;  |  &nbsp;TOMOGRAFÍA COMPUTARIZADA DE ABDOMEN Y PELVIS </option>
                                <option value="5">04 03 014  &nbsp;  |  &nbsp TOMOGRAFÍA COMPUTARIZADA DE ABDOMEN</option>

                                <option value="6">04 04 121 &nbsp;  |  &nbsp;  ECOGRAFÍA ABDOMINAL </option>
                                <option value="7">04 04 218 &nbsp;  |  &nbsp; ELASTOGRAFÍA HEPÁTICA</option>
                                <option value="8">04 05 020 &nbsp;  |  &nbsp; RESONANCIA MAGNÉTICA ANGIOGRAFÍA DE ABDOMEN	</option>
                                <option value="9">04 05 010 &nbsp;  |  &nbsp; RESONANCIA MAGNÉTICA DE ABDOMEN	</option>
                                <option value="10">04 05 098 &nbsp;  |  &nbsp;  COLANGIORESONANCIA	 </option>

                                <option value="11">05 01 111&nbsp;  |  &nbsp; ESTUDIO MOTILIDAD ESOFÁGICA Y/O REFLUJO GASTROESOFÁGICO</option>
                                <option value="12">05 01 112 &nbsp;  |  &nbsp; VACIAMIENTO GÁSTRICO LÍQUIDO O SÓLIDO		</option>
                                <option value="13">05 01 113 &nbsp;  |  &nbsp; CINTIGRAFÍA VESÍCULA Y VÍA BILIAR</option>
                                <option value="14">05 01 114  &nbsp;  |  &nbsp;DETECCIÓN DE SITIO DE SANGRAMIENTO DIGESTIVO CON GLÓBULOS ROJOS MARCADOS </option>
                                <option value="15"05 01 115 &nbsp;  |  &nbsp; DETECCIÓN DIVERTÍCULO MECKEL </option>
                                <option value="16">05 01 116  &nbsp;  |  &nbsp; SPECT HEPATOESPLÉNICO, EVALUACIÓN HEMANGIOMA O HIPERPLASIA	</option>
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
                <button type="button" class="btn btn-primary btn-sm" onclick="enviar_examenes_paciente(2)"><i class="fas fa-email"></i>Enviar a paciente</button>
                <button type="button" class="btn btn-danger btn-sm" onclick="sol_rx_gastro();" data-bs-dismiss="modal" >Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>

    function sol_rx_gastro()
    {
        $('#m_rx_gastro').modal('show');
         $.ajax({
                url: '{{ route('listar.examen') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    sub_tipo_examen: 356
                },
        })
        .done(function(response) {
            $('#examen_rx').val(null).trigger('change');
        
            // Limpiar las opciones existentes
            $('#examen_rx').empty();
            
            // Agregar opción por defecto
            $('#examen_rx').append('<option value="">Seleccione...</option>');
            
            // Cargar los exámenes en el select2
            for (var i = 0; i < response.length; i++) {
                $('#examen_rx').append(`<option value="${response[i].cod_examen}">
                    ${response[i].nombre_examen}
                </option>`);
            }
            
            // Reinicializar el select2 si es necesario
            $('#examen_rx').trigger('change');
        })
        .fail(function() {
            console.log("error");
        })
    }
    function cerrarsol_rx_gastro() {
        $('#m_rx_gastrol').modal ('hide');
      }
    function limpiar_campos(tipo){
        if(tipo == 1){
            // limpiar campos
            $('#ex-funcional').val(null).trigger('change');
            $('#diagnostico_especialidad').val('');
            $('#observaciones_especialidad').val('');
        }else if(tipo == 2){
            // limpiar campos
            $('#examen_rx').val(null).trigger('change');
            $('#diagnostico_rx').val('');
            $('#observaciones_rx').val('');
        }else if(tipo == 3){
            // limpiar campos
            $('#examenes_endoscopico').val(null).trigger('change');
            $('#diagnostico_endoscopico').val('');
            $('#observaciones_endoscopias').val('');
        }else if(tipo == 4){
            // limpiar campos
            $('#ex-frecuente').val(null).trigger('change');
            $('#diagnostico_comunes').val('');
            $('#observaciones_comunes').val('');
        }
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
