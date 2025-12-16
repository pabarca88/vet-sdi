<div id="m_espiro" class="modal fade" role="dialog" aria-labelledby="m_espiro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Exámenes Funcionales</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row mt-1">

                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label class="floating-label-activo-sm" for="ex-funcional">Exámenes Funcionales</label>
                            <select class="js-example-basic-multiple select2" name="ex-funcional" id="ex-funcional"
                                multiple="multiple">
                                <option value="1">17 07 001 &nbsp; | &nbsp; ESPIROMETRÍA BASAL </option>
                                <option value="2">17 07 002 &nbsp; | &nbsp;ESPIROMETRÍA BASAL Y CON BRONCODILATADOR
                                </option>
                                <option value="3">17 07 003 &nbsp; | &nbsp;PRUEBA DE PROVOCACIÓN CON ALERGENO
                                </option>
                                <option value="4">17 07 004 &nbsp; | &nbsp;TEST DE PROVOCACIÓN CON EJERCICIO
                                </option>
                                <option value="5">17 07 005 &nbsp; | &nbsp;TEST DE PROVOCACIÓN CON METACOLINA
                                </option>
                                <option value="6">17 07 051 &nbsp; | &nbsp;CURVA DOSIS RESPUESTA A
                                    BRONCODILATADORES</option>
                                <option value="7">17 07 007 &nbsp; | &nbsp;ANÁLISIS DE GAS ESPIRADO </option>
                                <option value="8">17 07 008 &nbsp; | &nbsp;ESTUDIO DE CAPACIDAD DE DIFUSIÓN
                                </option>
                                <option value="9">17 07 009 &nbsp; | &nbsp;CAPACIDAD FÍSICA DEL TRABAJO </option>
                                <option value="11">17 07 011 &nbsp; | &nbsp;CURVA DE RELACIÓN FLUJO-VOLUMEN BASAL
                                </option>
                                <option value="10">17 07 010 &nbsp; | &nbsp;CURVA DE LAVADO DE NITRÓGENO </option>
                                <option value="12">17 07 012 &nbsp; | &nbsp;DISTENSIBILIDAD PULMONAR, (COMPLIANCE)
                                </option>
                                <option value="13">17 07 013 &nbsp; | &nbsp;MEDICIÓN DE PRESIÓN DE OCLUSIÓN
                                </option>
                                <option value="14">17 07 014 &nbsp; | &nbsp;MEDICIÓN DE PRESIÓN INSPIRATORIA MÁXIMA
                                </option>
                                <option value="15">17 07 015 &nbsp; | &nbsp;MEDICIÓN DE PRESIÓN TRANS-DIAFRAGMÁTICA
                                </option>
                                <option value="16">17 07 016 &nbsp; | &nbsp;REGISTRO FLUJOMÉTRICO </option>
                                <option value="17">17 07 017 &nbsp; | &nbsp;RESPUESTA RESPIRATORIA AL CO2 </option>
                                <option value="18">17 07 018 &nbsp; | &nbsp;TIEMPO DE TOLERANCIA A LA FATIGA
                                    RESPIRATORIA </option>
                                <option value="19">17 07 019 &nbsp; | &nbsp; ESTUDIO DE VENTILACIÓN ALVEOLAR
                                    VOL.ESPACIO MUERTO Y CR </option>
                                <option value="20">17 07 025 &nbsp; | &nbsp; GASOMETRÍA ARTERIAL EN REPOSO Y
                                    EJERCICIO</option>
                                <option value="21">17 07 038 &nbsp; | &nbsp; POLIGRAFÍA CARDIORRESPIRATORIA DEL
                                    SUEÑO </option>
                                <option value="22">17 07 052 &nbsp; | &nbsp; SATUROMETRÍA NOCTURNA DEL SUEÑO
                                </option>
                                <option value="23">17 07 053 &nbsp; | &nbsp; TITULACIÓN AUTOMÁTICA DE CPAP </option>
                                <option value="24">17 07 063 &nbsp; | &nbsp; POLIGRAFÍA CARDIORRESPIRATORIA DEL
                                    SUEÑO AMBULATORIA</option>
                                <option value="25"> 17 07 054&nbsp; | &nbsp; SATURACIÓN DE O2 EN REPOSO Y/O
                                    EJERCICIO (CON OXÍMETRO) </option>
                                <option value="25">17 07 055 &nbsp; | &nbsp; ATURACIÓN DE O2 EN REPOSO Y EJERCICIO Y
                                    O2 100% (CON OXÍMETRO) </option>

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
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1" onfocus="this.rows=3"
                                    onblur="this.rows=1;" name="observaciones_especialidad" id="observaciones_especialidad"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right"
                                onclick="guardar_examenes(1)">
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
                                        @if (isset($examenes_plan_tratamiento))
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
                                                            <button type="button" class="btn btn-danger btn-sm mb-1"
                                                                onclick="eliminarExamen('{{ $examen->id }}',1, '{{ $examen_nombre }}')"><i
                                                                    class="fas fa-trash"></i></button>
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
                <button type="button" class="btn btn-danger btn-sm" onclick="cerrarsol_examen_espiro();"
                    data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<style>
    .select2-dropdown {
        z-index: 9999 !important;
    }
</style>
<!-- select2 selectbonito css -->
<link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/formularios.css') }}">


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script>
    function sol_examen_espirometria() {
        console.log('solicitud examen espirometria');
         $.ajax({
                url: '{{ route('listar.examen') }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    sub_tipo_examen: 765
                },
        })
        .done(function(response) {
            console.log(response);
            $('#ex-funcional').val(null).trigger('change');

            // Limpiar las opciones existentes
            $('#ex-funcional').empty();

            // Agregar opción por defecto
            $('#ex-funcional').append('<option value="">Seleccione...</option>');

            // Cargar los exámenes en el select2
            for (var i = 0; i < response.length; i++) {
                $('#ex-funcional').append(`<option value="${response[i].cod_examen}">
                    ${response[i].nombre_examen}
                </option>`);
            }

            // Reinicializar el select2 si es necesario
            $('#ex-funcional').trigger('change');
        })
        .fail(function() {
            console.log("error");
        })
        $('#m_espiro').modal('show');
    }

    function cerrarsol_examen_espiro() {
        $('#m_espiro').modal('hide');
    }

    function guardar_examenes(tipo) {
        if (tipo == 1) {
            // Obtener valores de los exámenes seleccionados
            var select = document.getElementById("ex-funcional");
            var selectedOptions = Array.from(select.selectedOptions);
            // Obtener diagnóstico y observaciones
            var diagnostico = document.getElementById('diagnostico_especialidad').value;
            var observaciones = document.getElementById("observaciones_especialidad").value;
        } else if (tipo == 2) {
            // Obtener valores de los exámenes seleccionados
            var select = document.getElementById("examen_rx");
            var selectedOptions = Array.from(select.selectedOptions);
            // Obtener diagnóstico y observaciones
            var diagnostico = document.getElementById('diagnostico_rx').value;
            var observaciones = document.getElementById("observaciones_rx").value;
        } else if (tipo == 3) {
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
            type: 'post',
            url: url,
            data: data,
            success: function(resp) {
                console.log(resp);
                if (resp.success) {
                    // Limpiar campos
                    limpiar_campos(tipo);
                    swal({
                        title: 'Se han guardado con éxito los examenes',
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
            error: function(error) {
                console.log(error.responseText);
            }
        })
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
                            swal({
                                title: "Error",
                                text: resp.message || "Error al eliminar",
                                icon: "error",
                                button: "Aceptar"
                            });
                        }
                    },
                    error: function (xhr) {
                        console.error(xhr.responseText);
                        swal({
                            title: "Error",
                            text: "No se pudo eliminar el examen.",
                            icon: "error",
                            button: "Aceptar"
                        });
                    }
                });
            }
        });
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

    // function generarPDF(id, nombre_examen = null){
    //     console.log(id, nombre_examen);
    //     let data = {
    //         id: id,
    //         nombre_examen: nombre_examen,
    //         id_ficha_atencion: $('#id_ficha_atencion').val(),
    //         _token: CSRF_TOKEN
    //     }

    //     let url = "{{ ROUTE('profesional.examen.generarPDF') }}";
    //     $.ajax({
    //         type:'post',
    //         data: data,
    //         url: url,
    //         success: function(data){
    //             console.log(data);
    //             if(data.ruta){
    //                     swal({
    //                         title: "Reporte generado",
    //                         text: "El reporte se ha generado correctamente",
    //                         icon: "success",
    //                         button: "Aceptar"
    //                     }).then(() => {
    //                         // Abrir el PDF en una ventana emergente
    //                         var width = 800;
    //                         var height = 600;
    //                         var left = (screen.width - width) / 2;
    //                         var top = (screen.height - height) / 2;
    //                         window.open(data.ruta, 'Reporte Diario', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
    //                     });
    //                 }else{
    //                     swal({
    //                         title: "Error",
    //                         text: "Ha ocurrido un error al generar el reporte",
    //                         icon: "error",
    //                         button: "Aceptar"
    //                     });
    //                 }
    //         },
    //         error: function(error){
    //             console.log(error.responseText);
    //         }
    //     })
    // }

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

        $('#m_bronco').modal('hide');
        $('#m_rx_brpul').modal('hide');
        $('#m_espiro').modal('hide');
    }
</script>
{{--  <link rel="stylesheet"  href="{{ asset('css\plugins\select2.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
<!-- select2 Js -->
<script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>
<!-- form-select-custom Js -->
<script src="{{ asset('js/pages/form-select-custom.js') }}"></script>
<!-- select2 css -->  --}}
