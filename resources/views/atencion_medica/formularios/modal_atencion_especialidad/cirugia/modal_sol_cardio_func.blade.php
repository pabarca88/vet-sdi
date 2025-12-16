<div id="m_func_cardio" class="modal fade" role="dialog" aria-labelledby="m_func_cardio" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Exámenes Funcionales Cardiologìa</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal"  aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row mt-1">
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="ex-funcional">Exámenes Funcionales</label>
                            <select class="js-example-basic-multiple select2" name="ex-funcional" id="ex-funcional" multiple="multiple">
                                <option value="1"> 17 01 001  &nbsp;  |  &nbsp;     ELECTROCARDIOGRAMA (E.C.G.)	</option>
                                <option value="2"> 17 01 003  &nbsp;  |  &nbsp;ELECTROCARDIOGRAMA DE ESFUERZO 	</option>
                                <option value="3"> 17 01 004  &nbsp;  |  &nbsp;REGISTRO DE HAZ DE HIS, EN ADULTOS O NIÑOS</option>
                                <option value="4"> 17 01 006&nbsp;  |  &nbsp; E.C.G. CONTINUO (TEST HOLTER O SIMILARES)</option>
                                <option value="5"> 17 01 007 &nbsp;  |  &nbsp; ECOCARDIOGRAMA DOPPLER, CON REGISTRO </option>
                                <option value="6"> 17 01 055 3 &nbsp;  |  &nbsp; ECOCARDIOGRAMA BIDIMENSIONAL DOPPLER COLOR TRANSESOFÁGICO 	</option>
                                <option value="7"> 17 01 045 &nbsp;  |  &nbsp; ECOCARDIOGRAMA BIDIMENSIONAL DOPPLER COLOR	ANÁLISIS DE GAS ESPIRADO  </option>
                                <option value="8"> 17 01 008  &nbsp;  |  &nbsp;ECOCARDIOGRAMA BIDIMENSIONAL </option>
                                <option value="9"> 17 01 009&nbsp;  |  &nbsp; MONITOREO DE PRESIÓN ARTERIAL CONTINUO </option>
                                <option value="11"> 17 01 056  &nbsp;  |  &nbsp;ECOCARDIOGRAMA FETAL	 </option>
                                <option value="10"> 17 01 015 &nbsp;  |  &nbsp; DOPPLER CON ERGOMETRÍA	</option>
                                <option value="12"> 17 01 016&nbsp;  |  &nbsp; DOPPLER SIMPLE DE VASOS PERIFÉRICOS 	</option>
                                <option value="13"> 17 01 017 &nbsp;  |  &nbsp; PLETISMOGRAFÍA EN REPOSO, ESFUERZO C/U</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm">Diagnóstico</label>
                            <input type="text" class="form-control" data-input_igual="descripcion_hipotesis,diagnostico_rx,diagnostico_comunes,diagnostico_endoscopico" name="diagnostico_especialidad" id="diagnostico_especialidad" onchange="cargarIgual('diagnostico_especialidad');" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="observaciones_especialidad" id="observaciones_especialidad"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right" onclick="guardar_examenes(1)">
                            <i class="fa fa-plus"></i> Agregar examen</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs" id="table_examen_1">
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
                                        @if(isset($examenes_plan_tratamiento))
                                            @foreach ($examenes_plan_tratamiento as $examen)
                                                @foreach (json_decode($examen->examenes, true) as $examen_nombre)
                                                    <tr>
                                                        {{-- Fecha --}}
                                                        <td class="text-center align-middle">
                                                            {{ \Carbon\Carbon::parse($examen->created_at)->format('d-m-Y H:i') }}
                                                        </td>

                                                        {{-- Examen --}}
                                                        <td class="text-left align-middle">
                                                            • {{ $examen_nombre }}
                                                        </td>

                                                        {{-- Diagnóstico --}}
                                                        <td class="text-left align-middle">
                                                            {{ $examen->diagnostico }}
                                                        </td>

                                                        {{-- Observaciones --}}
                                                        <td class="text-left align-middle">
                                                            {{ $examen->observaciones }}
                                                        </td>

                                                        {{-- Acciones --}}
                                                        <td class="text-center align-middle">
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm mb-1"
                                                                onclick="eliminarExamen('{{ $examen->id }}',1, '{{ $examen_nombre }}')"
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
                            <button type="button" class="btn btn-success btn-sm" onclick="generarPDFtipoExamen(1)">Generar PDF</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" onclick="cerrarsol_ex_func_cardio();" data-bs-dismiss="modal" >Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<style>
    .select2-dropdown{
        z-index: 9999 !important;
    }
</style>
<script>

    function sol_ex_funcional_cardio()
    {
         $('#m_func_cardio').modal('show');
    }
       function cerrarsol_ex_func_cardio() {
        $('#m_func_cardio').modal ('hide');
      }

    function guardar_examenes(tipo) {
        if(tipo == 1){
            // Obtener valores de los exámenes seleccionados
            var select = document.getElementById("ex-funcional");
            var selectedOptions = Array.from(select.selectedOptions);
            // Obtener diagnóstico y observaciones
            var diagnostico = document.getElementById('diagnostico_especialidad').value;
            var observaciones = document.getElementById("observaciones_especialidad").value;
        }else if(tipo == 2){
            // Obtener valores de los exámenes seleccionados
            var select = document.getElementById("examen_rx");
            var selectedOptions = Array.from(select.selectedOptions);
            // Obtener diagnóstico y observaciones
            var diagnostico = document.getElementById('diagnostico_rx').value;
            var observaciones = document.getElementById("observaciones_rx").value;
        }else if(tipo == 3){
            // Obtener valores de los exámenes seleccionados
            var select = document.getElementById("examenes_endoscopico");
            var selectedOptions = Array.from(select.selectedOptions);
            // Obtener diagnóstico y observaciones
            var diagnostico = document.getElementById('diagnostico_endoscopico').value;
            var observaciones = document.getElementById("observaciones_endoscopias").value;
        }


        if (selectedOptions.length === 0) {
            alert("Debe seleccionar al menos un examen.");
            return;
        }



        let examenes_texto = selectedOptions.map(option => option.text);

        let data = {
            diagnostico: diagnostico,
            observaciones: observaciones,
            id_ficha_atencion: $('#id_fc').val(),
            tipo_examen: tipo,
            examenes: examenes_texto,
            _token: CSRF_TOKEN
        }

        let url = "{{ ROUTE('profesional.examen.registro') }}";
        $.ajax({
            type:'post',
            url: url,
            data: data,
            success: function(resp){
                console.log(resp);
                if (resp.success) {
                    limpiar_campos(tipo);
                    swal({
                        title:'Se han guardado con éxito los examenes',
                        icon:'success',
                    });
                    let tbody = $('#table_examen_'+tipo+' tbody');
                    tbody.empty(); // Limpiar tabla

                    resp.examenes.forEach(item => {
                        item.examenes.forEach(nombre_examen => {
                            tbody.append(`
                                <tr>
                                    <td class="text-center align-middle">${item.fecha}</td>
                                    <td class="align-middle">${nombre_examen}</td>
                                    <td class="align-middle">${item.diagnostico}</td>
                                    <td class="align-middle">${item.observaciones || ''}</td>
                                    <td class="text-center align-middle">
                                        <button type="button" class="btn btn-danger btn-sm" onclick="eliminarExamen(${item.id},${tipo},'${nombre_examen}')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            `);
                        });
                    });

                }
            },
            error: function(error){
                console.log(error.responseText);
            }
        })
    }

     function limpiar_campos(tipo){
        if(tipo == 1){
            // limpiar campos
            $('#ex-funcional').val(null).trigger('change');
        }else if(tipo == 2){
            // limpiar campos
            $('#examen_rx').val(null).trigger('change');
        }else if(tipo == 3){
            // limpiar campos
            $('#examenes_endoscopico').val(null).trigger('change');
        }else if(tipo == 4){
            // limpiar campos
            $('#ex-frecuente').val(null).trigger('change');
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

    function eliminarExamen(id,tipo, nombre_examen = null) {
        swal({
            title: "¿Estás seguro?",
            text: "¿Deseas eliminar este examen?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ route('profesional.examen.eliminar') }}",
                    type: 'POST',
                    data: {
                        id: id,
                        id_ficha_atencion: $('#id_fc').val(),
                        tipo: tipo,
                        nombre_examen: nombre_examen,
                        _token: CSRF_TOKEN
                    },
                    success: function (resp) {
                        console.log(resp);
                        if (resp.success) {
                            swal({
                                title: 'Se ha eliminado con éxito el examen',
                                icon: 'success',
                            });
                            let tbody = $('#table_examen_' + tipo + ' tbody');
                            tbody.empty(); // Limpiar tabla

                            resp.examenes.forEach(item => {
                                item.examenes.forEach(nombre_examen => {
                                    tbody.append(`
                                        <tr>
                                            <td class="text-center align-middle">${item.fecha}</td>
                                            <td class="align-middle">${nombre_examen}</td>
                                            <td class="align-middle">${item.diagnostico}</td>
                                            <td class="align-middle">${item.observaciones || ''}</td>
                                            <td class="text-center align-middle">
                                                <button type="button" class="btn btn-danger btn-sm" onclick="eliminarExamen(${item.id},${tipo}, '${nombre_examen}')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    `);
                                });
                            });
                        } else {
                            alert(resp.message || "Error al eliminar");
                        }
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        alert("Ocurrió un error al eliminar.");
                    }
                });
            } else {
                swal("El examen no ha sido eliminado.");

            }
        });
    }

function generarPDF(id, nombre_examen = null) {
        let id_ficha_atencion = $('#id_fc').val(); // input hidden en tu HTML
        let auto = 1; // o el valor real que quieras enviar
        let url = "{{ route('pdf.orden_examenes_plan_tto') }}";


        Fancybox.show(
            [{
                src: "{{ route('pdf.orden_examenes_plan_tto') }}?id=" + id + "&nombre=" + nombre_examen,
                type: "iframe",
                preload: false,
            }, ]
        );

        // $('#m_bronco').modal('hide');
        // $('#m_rx_brpul').modal('hide');
        // $('#m_espiro').modal('hide');
    }

</script>
{{--  <link rel="stylesheet"  href="{{ asset('css\plugins\select2.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
<!-- select2 Js -->
<script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>
<!-- form-select-custom Js -->
<script src="{{ asset('js/pages/form-select-custom.js') }}"></script>
<!-- select2 css -->  --}}
