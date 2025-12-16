<div class="card-informacion">
    <div class="card-header">
        <h5 class="card-title">Nuevo examen radiológico</h5>
    </div>
    <div class="card-body">
        <div id="pieza_dentalrx{{ $counter }}" class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="form-row">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <div class="form-group">
                            <label for="odontop_numero_pieza_{{ $counter }}" class="floating-label-activo-sm">Pieza N°</label>
                            <select class="form-control form-control-sm" name="odontop_numero_pieza_{{ $counter }}" id="odontop_numero_pieza_{{ $counter }}">
                                <option value="0">Seleccione</option>
                                @foreach (['5.1', '5.2', '5.3', '5.4', '5.5', '6.1', '6.2', '6.3', '6.4', '6.5', '7.1', '7.2', '7.3', '7.4', '7.5', '8.1', '8.2', '8.3', '8.4', '8.5'] as $pieza)
                                    <option value="{{ $pieza }}" @if(in_array($pieza, $piezasSeleccionadas ?? [])) selected @endif>{{ $pieza }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>
                            <select name="odontop_rx_esp_peri_apical{{ $counter }}" id="odontop_rx_esp_peri_apical{{ $counter }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('odontop_rx_esp_peri_apical','odontop_div_detalle_rx_esp_peri_apical','odontop_det_rx_esp_peri_apical',4)">
                                <option value="0">Seleccione</option>
                                <option value="1">Normal</option>
                                <option value="2">Engrosado</option>
                                <option value="3">Ausente</option>
                                <option value="4">Otro</option>
                            </select>
                        </div>
                        <div class="form-group"   id="odontop_div_detalle_rx_esp_peri_apical" style="display:none">
                            <label class="floating-label-activo-sm">Espacio Periodontal Apical<i>(describir)</i></label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="odontop_det_rx_esp_peri_apical" id="odontop_det_rx_esp_peri_apical"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>
                            <select name="odontop_h_apical{{ $counter }}" id="odontop_h_apical{{ $counter }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('odontop_h_apical','odontop_div_detalle_h_apical','odontop_aprec_h_apical',5)">
                                <option value="0">Seleccione</option>
                                <option value="1">Normal</option>
                                <option value="2">Zona apical Difusa</option>
                                <option value="3">Zona apical Corticalizada</option>
                                <option value="4">Osteítis Condensante</option>
                                <option value="5">Otro<i>(describir)</i></option>
                            </select>
                        </div>
                        <div class="form-group"  id="div_detalle_h_apical" style="display:none">
                            <label class="floating-label-activo-sm">Hueso Alveolar Apical<i>(describir)</i></label>
                            <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_h_apical" id="aprec_h_apical"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="card-body-aten-a">
                            <!-- [ Main Content ] start -->
                            <div class="dropzone" id="mis-imagenes-imagenes-rx-dental_end" action="{{ route('profesional.imagen.carga') }}"></div>
                            <!-- [ file-upload ] end -->
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="form-group">
                                <label class="floating-label-activo-sm">Observaciones Examen Pieza</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="odontop_obs_ex_oral{{ $counter }}" id="odontop_obs_ex_oral{{ $counter }}"></textarea>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-icon btn-success-light-c" onclick="guardar_nueva_pieza_ex_radio_odontop({{ $counter }})"><i class="fas fa-save"></i></button>
    </div>
</div>

<script>
if (typeof dropzoneOdontop === 'undefined') {
    var dropzoneOdontop;
}

$(document).ready(function(){
    // Configuración de Dropzone
    initDropzoneOdontop();
});

function initDropzoneOdontop() {
    if (dropzoneOdontop) {
        dropzoneOdontop.destroy();
        dropzoneOdontop = null;
    }

    dropzoneOdontop = new Dropzone("#mis-imagenes-imagenes-rx-dental_end", {
        url: "{{ route('profesional.imagenes.guardar_rx_end_dental') }}",
        method: 'post',
        autoProcessQueue: false,  // No procesar automáticamente
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        paramName: "file",  // Cambiar de "file[]" a "file" para envío individual
        acceptedFiles: "image/*",
        maxFilesize: 4,  // Tamaño máximo en MB
        maxFiles: 12,
        addRemoveLinks: true,
        dictDefaultMessage: "Arrastra una imagen aquí o haz clic para subirla.",
        dictRemoveFile: "Eliminar archivo",
        dictFileTooBig: "El archivo es demasiado grande. Tamaño máximo permitido: 4MB.",
        dictInvalidFileType: "No puedes subir archivos de este tipo.",
        dictResponseError: "Error del servidor.",
        success: function (file, response) {
            console.log("Imagen subida con éxito:", response);
            if (response.success) {
                console.log("Archivo guardado correctamente:", response);
            }
        },
        error: function (file, message, xhr) {
            console.error("Error al subir imagen:", message);
            console.error("Detalles del error:", xhr);

            // Mostrar error más detallado
            if (typeof message === 'object' && message.message) {
                console.error("Mensaje del servidor:", message.message);
            }

            // Remover el archivo con error de la vista
            if (file.previewElement) {
                file.previewElement.classList.add("dz-error");
            }
        },
        sending: function (file, xhr, formData) {
            console.log("Enviando archivo:", file.name);

            // Verificar que todos los elementos existan antes de obtener sus valores
            try {
                const idPaciente = $('#id_paciente').val() || '';
                const idLugarAtencion = $('#id_lugar_atencion').val() || '';
                const idEspecialidad = $('#id_especialidad').val() || '';
                const idProfesional = $('#id_profesional_fc').val() || '';
                const idExamenRx = $('#id_examen_oral_rx').val() || '';
                const tipo_examen = 'odontop';

                // Validar que los datos críticos estén presentes
                if (!idPaciente) {
                    console.error("ID del paciente no encontrado");
                    return false;
                }
                if (!idExamenRx) {
                    console.error("ID del examen RX no encontrado");
                    return false;
                }

                formData.append("id_paciente", idPaciente);
                formData.append("id_lugar_atencion", idLugarAtencion);
                formData.append("id_especialidad", idEspecialidad);
                formData.append("id_profesional", idProfesional);
                formData.append("id_examen", idExamenRx);
                formData.append("tipo_examen", tipo_examen);

                console.log("Datos adicionales enviados:", {
                    id_paciente: idPaciente,
                    id_lugar_atencion: idLugarAtencion,
                    id_especialidad: idEspecialidad,
                    id_profesional: idProfesional,
                    id_examen: idExamenRx,
                    tipo_examen: tipo_examen
                });
            } catch (error) {
                console.error("Error al preparar datos para envío:", error);
                return false;
            }
        },
        queuecomplete: function() {
            console.log("Todas las imágenes han sido procesadas");
        }
    });
}

function ocultar_nueva_pieza_dental_rx_odontop(){
    $('#nueva_pieza_dental_odontop_').empty();
}

function guardar_nueva_pieza_ex_radio_odontop(count){
    let numero_pieza = $('#odontop_numero_pieza_'+count).val();
    let espacio_periodontal_aplical = $('#odontop_rx_esp_peri_apical'+count).val();
    let hueso_alveolar_apical = $('#odontop_h_apical'+count).val();
    let obs = $('#odontop_obs_ex_oral'+count).val();
    let id_paciente = $('#id_paciente').val();
    let id_lugar_atencion = $('#id_lugar_atencion').val();
    let id_especialidad = $('#id_especialidad').val();
    let id_profesional = $('#id_profesional_fc').val();
    let id_ficha_atencion = $('#id_fc').val();

    let valido = 1;
    let mensaje = '';

    if(numero_pieza == '' || numero_pieza == 0){
        valido = 0;
        mensaje += '<li>numero de pieza </li>';
    }
    if(espacio_periodontal_aplical == 0){
        valido = 0;
        mensaje += '<li>Espacio periodontal </li>';
    }
    if(hueso_alveolar_apical == 0){
        valido = 0;
        mensaje += '<li>Hueso alveolar </li>';
    }
    if(valido == 0){
        swal({
            title: "Campos requeridos",
            content:{
                element: "div",
                attributes:{
                    innerHTML: mensaje,
                },
            },
            icon: "error",
            buttons: "Aceptar",
            DangerMode: true,
        });
        return false;
    }

    let data = {
        numero_pieza: numero_pieza,
        espacio_periodontal_aplical: espacio_periodontal_aplical,
        hueso_alveolar_apical: hueso_alveolar_apical,
        obs: obs,
        id_paciente: id_paciente,
        id_lugar_atencion: id_lugar_atencion,
        id_especialidad: id_especialidad,
        id_profesional: id_profesional,
        id_fc: id_ficha_atencion,
        tipo_examen: 'odontop'
    }

    console.log(data);

    let url = "{{ route('profesional.guardar_pieza_dental_examen_oral_rx_end') }}";

    $.ajax({
        type: 'post',
        data: {
            _token: CSRF_TOKEN,
            numero_pieza: numero_pieza,
            espacio_periodontal_aplical: espacio_periodontal_aplical,
            hueso_alveolar_apical: hueso_alveolar_apical,
            obs: obs,
            id_paciente: id_paciente,
            id_lugar_atencion: id_lugar_atencion,
            id_especialidad: id_especialidad,
            id_profesional: id_profesional,
            id_fc: id_ficha_atencion,
            tipo_examen: 'odontop'
        },
        url: url,
        success: function(resp){
            console.log("Respuesta del servidor:", resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_pieza_dental_odontop').empty();
                $('#contenedor_pieza_dental_odontop').append(resp.v);

                $('#id_examen_oral_rx').val(resp.rx.id);
                mostrar_nueva_pieza_oral_rx_odontop();
                $('#nueva_pieza_dental_odontop_').empty();

                // Verificar que dropzoneOdontop existe antes de procesar
                if (typeof dropzoneOdontop !== 'undefined' && dropzoneOdontop !== null) {
                    // procesar cola del dropzone
                    if (dropzoneOdontop.getQueuedFiles().length > 0) {
                        console.log("Iniciando carga de imágenes...");
                        console.log("Archivos en cola:", dropzoneOdontop.getQueuedFiles().length);

                        // Verificar que el ID del examen esté disponible antes de procesar
                        if (resp.rx && resp.rx.id) {
                            // Actualizar el ID del examen en el campo hidden
                            $('#id_examen_oral_rx').val(resp.rx.id);

                            // Desvinculamos eventos anteriores
                            dropzoneOdontop.off("queuecomplete");
                            dropzoneOdontop.off("error");

                            // Agregar evento de éxito para cada archivo
                            dropzoneOdontop.on("success", function(file, response) {
                                console.log("Imagen individual subida:", response);
                            });

                            // Agregar evento de error mejorado
                            dropzoneOdontop.on("error", function(file, message, xhr) {
                                console.error("Error específico al subir:", {
                                    file: file.name,
                                    message: message,
                                    xhr: xhr
                                });
                            });

                            // Procesar la cola de imágenes
                            dropzoneOdontop.processQueue();

                            // Evento cuando se complete toda la cola
                            dropzoneOdontop.on("queuecomplete", function() {
                                console.log("Carga de imágenes completada.");
                                swal({
                                    icon: 'success',
                                    title: 'Éxito',
                                    text: 'Pieza dental e imágenes guardadas correctamente'
                                });
                            });
                        } else {
                            console.error("ID del examen no disponible para subir imágenes");
                            swal({
                                icon: 'warning',
                                title: 'Advertencia',
                                text: 'Pieza guardada, pero no se pudo obtener ID para subir imágenes'
                            });
                        }
                    } else {
                        console.log("No hay imágenes para cargar.");
                        swal({
                            icon: 'success',
                            title: 'Éxito',
                            text: 'Pieza dental guardada correctamente'
                        });

                        // Re-inicializar el Dropzone para la siguiente pieza
                        initDropzoneOdontop();
                    }
                } else {
                    console.error("dropzoneOdontop no está disponible");
                    swal({
                        icon: 'warning',
                        title: 'Advertencia',
                        text: 'Pieza guardada, pero hay problemas con el sistema de imágenes'
                    });

                    // Re-inicializar el Dropzone
                    initDropzoneOdontop();
                }
            } else {
                console.error("Error en respuesta del servidor:", resp);
                swal({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo guardar la pieza dental'
                });
            }
        },
        error: function(xhr, status, error){
            console.error("Error en AJAX:", {
                xhr: xhr,
                status: status,
                error: error,
                responseText: xhr.responseText
            });

            swal({
                icon: 'error',
                title: 'Error de conexión',
                text: 'No se pudo conectar con el servidor. Por favor intenta nuevamente.'
            });
        }
    })
}
</script>
