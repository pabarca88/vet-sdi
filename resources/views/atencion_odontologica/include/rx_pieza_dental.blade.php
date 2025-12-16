<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="form-row">
                <div class="col-md-6">
                    <!--IMAGENES-->
                    <div class="form-row" id="contenedor_piezas_ex_oral">
                        <div class="col-sm-12 col-md-12">
                            <div class="card-informacion mb-4">
                                <div class="card-top">
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Subir imagen radiológica</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- [ Main Content ] start -->
                                    <div class="dropzone" id="mis-imagenes-imagenes-rx-dental" action="{{ route('profesional.imagen.carga') }}"></div>
                                    <!-- [ file-upload ] end -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Piezas N°</label>
                                <select class="form-control form-control-sm select2" name="rx_numero_pieza" id="rx_numero_pieza" multiple>
                                    <option value="1.1">1.1</option>
                                    <option value="1.2">1.2</option>
                                    <option value="1.3">1.3</option>
                                    <option value="1.4">1.4</option>
                                    <option value="1.5">1.5</option>
                                    <option value="1.6">1.6</option>
                                    <option value="1.7">1.7</option>
                                    <option value="1.8">1.8</option>
                                    <option value="2.1">2.1</option>
                                    <option value="2.2">2.2</option>
                                    <option value="2.3">2.3</option>
                                    <option value="2.4">2.4</option>
                                    <option value="2.5">2.5</option>
                                    <option value="2.6">2.6</option>
                                    <option value="2.7">2.7</option>
                                    <option value="2.8">2.8</option>
                                    <option value="3.1">3.1</option>
                                    <option value="3.2">3.2</option>
                                    <option value="3.3">3.3</option>
                                    <option value="3.4">3.4</option>
                                    <option value="3.5">3.5</option>
                                    <option value="3.6">3.6</option>
                                    <option value="3.7">3.7</option>
                                    <option value="3.8">3.8</option>
                                    <option value="4.1">4.1</option>
                                    <option value="4.2">4.2</option>
                                    <option value="4.3">4.3</option>
                                    <option value="4.4">4.4</option>
                                    <option value="4.5">4.5</option>
                                    <option value="4.6">4.6</option>
                                    <option value="4.7">4.7</option>
                                    <option value="4.8">4.8</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>
                                <select name="rx_esp_peri_apical{{ $counter }}" id="rx_esp_peri_apical{{ $counter }}" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('rx_esp_peri_apical{{ $counter }}','div_detalle_rx_esp_peri_apical{{ $counter }}','det_rx_esp_peri_apical{{ $counter }}',4)">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Normal</option>
                                    <option value="2">Engrosado</option>
                                    <option value="3">Ausente</option>
                                    <option value="4">Otro</option>
                                </select>
                            </div>
                            <div class="form-group"   id="div_detalle_rx_esp_peri_apical{{ $counter }}" style="display:none">
                                <label class="floating-label-activo-sm">Espacio Periodontal Apical (Describir)</label>
                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="det_rx_esp_peri_apical{{ $counter }}" id="det_rx_esp_peri_apical{{ $counter }}"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>
                                <select name="h_apical{{ $counter }}" id="h_apical{{ $counter }}"  class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('h_apical{{ $counter }}','div_detalle_h_apical{{ $counter }}','aprec_h_apical{{ $counter }}',5)">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Normal</option>
                                    <option value="2">Zona apical Difusa</option>
                                    <option value="3">Zona apical Corticalizada</option>
                                    <option value="4">Osteítis Condensante</option>
                                    <option value="5">Otro (Describir)</option>
                                </select>
                            </div>
                            <div class="form-group"  id="div_detalle_h_apical{{ $counter }}" style="display:none">
                                <label class="floating-label-activo-sm">Hueso Alveolar Apical<i>(describir)</i></label>
                                <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="aprec_h_apical{{ $counter }}" id="aprec_h_apical{{ $counter }}"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Informe del radiólogo</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1"  data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="inf_rad{{ $counter }}" id="inf_rad{{ $counter }}"></textarea>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Observaciones al estudio radiológico</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1"  data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="obs_rad{{ $counter }}" id="obs_rad{{ $counter }}"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="btn btn-info btn-icon" onclick="guardar_nueva_pieza_ex_radio({{ $counter }})"><i class="feather icon-save"></i></button>
            <button type="button" class="btn btn-icon btn-danger" onclick="ocultar_nueva_pieza_dental_rx({{ $counter }})"><i class="feather icon-x"></i></button>
        </div>
    </div>
</div>

<input type="hidden" name="counter_" id="counter_" value="{{ $counter }}">

<script>
if (typeof dropzone === 'undefined') {
    var dropzone;
}
$(document).ready(function(){
    $('#rx_numero_pieza').select2({
        width: '100%',
        placeholder: 'Seleccionar pieza(s)',
        allowClear: true
    });
    // Configuración de Dropzone
    initDropzone();


    $('#rx_numero_pieza'+counter).select2();
});

function initDropzone() {
    if (dropzone) {
        dropzone.destroy();
        dropzone = null;
    }

    dropzone = new Dropzone("#mis-imagenes-imagenes-rx-dental", {
        url: "{{ route('profesional.imagenes.guardar_rx_dental') }}",
        method: 'post',
        autoProcessQueue: false,  // No procesar automáticamente
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        paramName: function() { return "file[]"; },  // Función que retorna el nombre del parámetro
        acceptedFiles: "image/*",
        maxFilesize: 4,  // Tamaño máximo en MB
        maxFiles: 12,
        addRemoveLinks: true,
        dictDefaultMessage: "Arrastra una imagen aquí o haz clic para subirla.",
        dictRemoveFile: "Eliminar archivo",
        accept: function(file, done) {
            // Validar que los campos requeridos existan ANTES de aceptar el archivo
            const idPaciente = $('#id_paciente_fc').val();
            const idLugarAtencion = $('#id_lugar_atencion').val();
            const idEspecialidad = $('#id_especialidad').val();
            const idProfesional = $('#id_profesional_fc').val();

            if (!idPaciente || !idLugarAtencion || !idEspecialidad || !idProfesional) {
                done("Faltan datos requeridos. Por favor, asegúrate de que todos los campos estén completos.");
            } else {
                done(); // Aceptar el archivo
            }
        },
        success: function (file, response) {
            console.log("Imagen subida con éxito:", response);
        },
        error: function (file, message, xhr) {
            console.error("Error al subir imagen:", {
                message: message,
                file: file.name,
                xhr: xhr,
                status: xhr ? xhr.status : 'N/A',
                responseText: xhr ? xhr.responseText : 'N/A'
            });

            // Mostrar mensaje de error más detallado
            let errorMsg = message;
            if (xhr && xhr.responseJSON && xhr.responseJSON.message) {
                errorMsg = xhr.responseJSON.message;
                if (xhr.responseJSON.errors) {
                    errorMsg += "\n" + Object.values(xhr.responseJSON.errors).flat().join(', ');
                }
            } else if (xhr && xhr.responseJSON && xhr.responseJSON.errors) {
                errorMsg = Object.values(xhr.responseJSON.errors).flat().join(', ');
            }

            swal({
                title: "Error al subir imagen",
                text: errorMsg,
                icon: "error",
                buttons: "Aceptar"
            });
        },
        sending: function (file, xhr, formData) {
            console.log("🚀 Evento sending disparado para:", file.name);

            // Verifica si formData es válido antes de agregar los datos
            if (formData) {
                // Agregar parámetros adicionales a formData con validación
                const idPacienteEl = document.getElementById('id_paciente_fc');
                const idLugarAtencionEl = document.getElementById('id_lugar_atencion');
                const idEspecialidadEl = document.getElementById('id_especialidad');
                const idProfesionalEl = document.getElementById('id_profesional_fc');
                const idExamenRxEl = document.getElementById('id_examen_oral_rx');

                const idPaciente = idPacienteEl ? idPacienteEl.value : null;
                const idLugarAtencion = idLugarAtencionEl ? idLugarAtencionEl.value : null;
                const idEspecialidad = idEspecialidadEl ? idEspecialidadEl.value : null;
                const idProfesional = idProfesionalEl ? idProfesionalEl.value : null;
                const idExamenRx = idExamenRxEl ? idExamenRxEl.value : null;

                console.log("📋 Valores obtenidos:", {
                    id_paciente: idPaciente,
                    id_lugar_atencion: idLugarAtencion,
                    id_especialidad: idEspecialidad,
                    id_profesional: idProfesional,
                    id_examen: idExamenRx
                });

                // Solo agregar si tienen valor
                if (idPaciente) formData.append("id_paciente", idPaciente);
                if (idLugarAtencion) formData.append("id_lugar_atencion", idLugarAtencion);
                if (idEspecialidad) formData.append("id_especialidad", idEspecialidad);
                if (idProfesional) formData.append("id_profesional", idProfesional);
                if (idExamenRx) formData.append("id_examen", idExamenRx);

                console.log("✅ FormData preparado para envío");
            } else {
                console.error("❌ formData no está disponible");
            }
        }
    });
}

function guardar_nueva_pieza_ex_radio(counter){
    console.log('hola');
    // Verifica los datos antes de procesar la cola de imágenes
    let numero_pieza = $('#rx_numero_pieza').val();
    let espacio_periodontal_aplical = $('#rx_esp_peri_apical'+counter).val();
    let hueso_alveolar_apical = $('#h_apical'+counter).val();
    let obs = $('#obs_ex_oral'+counter).val();
    let id_paciente = $('#id_paciente_fc').val();
    let id_lugar_atencion = $('#id_lugar_atencion').val();
    let id_especialidad = $('#id_especialidad').val();
    let id_profesional = $('#id_profesional_fc').val();
    let id_ficha_atencion = $('#id_fc').val();
    let informe_radiologo = $('#inf_rad'+counter).val();
    let observaciones_radiologo = $('#obs_rad'+counter).val();

    let valido = 1;
    let mensaje = '';

    // Realiza la validación de los campos requeridos
    if(numero_pieza == ''){
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

    // Si hay algún campo vacío o inválido, muestra un mensaje de error y no procesa las imágenes
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
        return false;  // Detiene el proceso si la validación falla
    }

    // Si la validación es exitosa, realizamos el envío de los datos a través de AJAX
    let data = {
        _token: CSRF_TOKEN,
        numero_pieza: numero_pieza,
        espacio_periodontal_aplical: espacio_periodontal_aplical,
        hueso_alveolar_apical: hueso_alveolar_apical,
        obs: obs,
        id_paciente: id_paciente,
        id_lugar_atencion: id_lugar_atencion,
        id_especialidad: id_especialidad,
        id_profesional: id_profesional,
        informe_radiologo: informe_radiologo,
        observaciones_radiologo: observaciones_radiologo,
        id_fc: id_ficha_atencion
    };

    let url = "{{ ROUTE('profesional.guardar_pieza_dental_examen_oral_rx') }}";

    $.ajax({
        type: 'post',
        data: data,
        url: url,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.v);
                // Inicializamos select2 SOLO para los nuevos elementos agregados
                $('#pieza_dentalrx').find('.select2').select2();
                swal({
                    icon:'success',
                    title:'Exito',
                    text:'Pieza agregada correctamente'
                });
                setTimeout(() => {
                    recargar_imagenes_od_gral();
                }, 1000);
            } else {
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.mensaje);
            }
            $('#contenedor_examenes_oral_rx').empty();

            $('#id_examen_oral_rx').val(resp.rx.id);

            // Una vez que el envío de datos ha sido exitoso, procesamos la cola de imágenes
            if (dropzone.getQueuedFiles().length > 0) {
                console.log("Iniciando carga de imágenes...");

                // Validar que todos los campos requeridos existan antes de procesar
                const requiredFields = {
                    id_paciente: $('#id_paciente_fc').val(),
                    id_lugar_atencion: $('#id_lugar_atencion').val(),
                    id_especialidad: $('#id_especialidad').val(),
                    id_profesional: $('#id_profesional_fc').val(),
                    id_examen: resp.rx.id
                };

                console.log("Validando campos requeridos:", requiredFields);

                // Verificar si algún campo está vacío
                const camposVacios = Object.entries(requiredFields).filter(([key, value]) => !value || value === '');

                if (camposVacios.length > 0) {
                    console.error("Campos vacíos detectados:", camposVacios);
                    swal({
                        title: "Error",
                        text: "Faltan datos requeridos para subir las imágenes: " + camposVacios.map(([key]) => key).join(', '),
                        icon: "error",
                        buttons: "Aceptar"
                    });
                    return;
                }

                // Desvinculamos el evento "queuecomplete" antes de procesar la cola
                dropzone.off("queuecomplete");

                // Procesar la cola de imágenes
                dropzone.processQueue();  // Esto procesará la cola y subirá las imágenes

                // Usamos un evento para esperar a que se complete la carga de imágenes
                dropzone.on("queuecomplete", function() {
                    // Una vez que la cola esté completa, podemos realizar más acciones si es necesario
                    console.log("Carga de imágenes completada.");

                    // Mostrar las imágenes subidas
                    if (resp.urls && resp.urls.length > 0) {
                        resp.urls.forEach(function(url) {
                            $('#contenedor_piezas_ex_oral').append(`
                                <div class="col-md-4">
                                    <img src="${url}" class="img-fluid" alt="Imagen subida">
                                </div>
                            `);
                        });
                    }
                });
            } else {
                console.log("No hay imágenes para cargar.");
                alert("No has seleccionado imágenes para subir.");

                // Si el Dropzone no está funcionando correctamente, puedes destruirlo y volver a inicializarlo
                if (dropzone) {
                    // Destruir la instancia actual de Dropzone
                    dropzone.destroy();
                }

                // Re-inicializar el Dropzone nuevamente
                //initDropzone();  // Asegúrate de que la función initDropzone esté disponible

            }
            mostrar_nueva_pieza_ex_radio(1000)
        },
        error: function(error){
            console.log(error);
        }
    });
}

function recargar_imagenes_od_gral() {
    // Aquí puedes implementar la lógica para recargar las imágenes de odontología general
    console.log("Recargando imágenes de odontología general...");
    // Por ejemplo, podrías hacer una llamada AJAX para obtener las imágenes actualizadas
}


function ocultar_nueva_pieza_dental_rx(){
    $('#contenedor_examenes_oral_rx').empty();
}

</script>
