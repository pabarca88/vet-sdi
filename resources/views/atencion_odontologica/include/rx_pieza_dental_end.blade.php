<div id="pieza_dentalrx{{ $counter }}" class="form-row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6">
                        <!--IMAGENES-->
                        <div class="form-row" id="contenedor_piezas_ex_oral_end">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-top">
                                        <h6 class="text-c-blue">Imagen Radiológica</h6>
                                    </div>
                                    <div class="card-body">
                                        <!-- [ Main Content ] start -->
                                        <div class="dropzone" id="mis-imagenes-imagenes-rx-dental_end" action="{{ route('profesional.imagen.carga') }}"></div>
                                        <!-- [ file-upload ] end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Piezas N°</label>
                                    <select class="form-control form-control-sm select2_rx_end" name="end_numero_pieza_{{ $counter }}[]" id="end_numero_pieza_{{ $counter }}" multiple>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>
                                        <option value="14">14</option>
                                        <option value="15">15</option>
                                        <option value="16">16</option>
                                        <option value="17">17</option>
                                        <option value="18">18</option>
                                        <option value="21">21</option>
                                        <option value="22">22</option>
                                        <option value="23">23</option>
                                        <option value="24">24</option>
                                        <option value="25">25</option>
                                        <option value="26">26</option>
                                        <option value="27">27</option>
                                        <option value="28">28</option>
                                        <!-- Agrega todas las piezas necesarias -->
                                    </select>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Espacio Periodontal Apical</label>
                                    <select name="end_rx_esp_peri_apical{{ $counter }}" id="end_rx_esp_peri_apical{{ $counter }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('end_rx_esp_peri_apical','end_div_detalle_rx_esp_peri_apical','end_det_rx_esp_peri_apical',4)">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Normal</option>
                                        <option value="2">Engrosado</option>
                                        <option value="3">Ausente</option>
                                        <option value="4">Otro</option>
                                    </select>
                                </div>
                                <div class="form-group"   id="end_div_detalle_rx_esp_peri_apical" style="display:none">
                                    <label class="floating-label-activo-sm">Espacio Periodontal Apical<i>(describir)</i></label>
                                    <textarea class="form-control caja-texto form-control-sm" data-titulo="Apreciación Respiratoria" data-seccion="Naríz"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="end_det_rx_esp_peri_apical" id="end_det_rx_esp_peri_apical"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Hueso Alveolar Apical</label>
                                    <select name="end_h_apical{{ $counter }}" id="end_h_apical{{ $counter }}" data-titulo="Apreciación Respiratoria" data-seccion="Naríz" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('end_h_apical','end_div_detalle_h_apical','end_aprec_h_apical',5)">
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
                                <label class="floating-label-activo-sm">Observaciones Examen Pieza</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1" data-titulo="Observaciones Examen Nasal" data-seccion="Naríz" data-tipo="general" onfocus="this.rows=2" onblur="this.rows=1;" name="end_obs_ex_oral{{ $counter }}" id="end_obs_ex_oral{{ $counter }}"></textarea>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-icon btn-info" onclick="guardar_nueva_pieza_ex_radio_end({{ $counter }})"><i class="feather icon-save"></i></button>
                <button type="button" class="btn btn-icon btn-danger" onclick="ocultar_nueva_pieza_dental_rx_end({{ $counter }})"><i class="feather icon-x"></i></button>
            </div>
        </div>
    </div>
</div>


<script>
if (typeof dropzoneEnd === 'undefined') {
    var dropzoneEnd;
}
$(document).ready(function(){
    $('.select2_rx_end').select2({
        width: '100%',
        placeholder: 'Seleccionar pieza(s)',
        allowClear: true
    });
    // Configuración de Dropzone
    initDropzoneEnd();
});

function initDropzoneEnd() {
    if (dropzoneEnd) {
        dropzoneEnd.destroy();
        dropzoneEnd = null;
    }

    dropzoneEnd = new Dropzone("#mis-imagenes-imagenes-rx-dental_end", {
        url: "{{ route('profesional.imagenes.guardar_rx_end_dental') }}",
        method: 'post',
        autoProcessQueue: false,  // No procesar automáticamente
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        paramName: "file[]",  // Enviar los archivos como un array
        acceptedFiles: "image/*",
        maxFilesize: 4,  // Tamaño máximo en MB
        maxFiles: 12,
        addRemoveLinks: true,
        dictDefaultMessage: "Arrastra una imagen aquí o haz clic para subirla.",
        dictRemoveFile: "Eliminar archivo",
        success: function (file, response) {
            console.log("Imagen subida con éxito:", response);
        },
        error: function (file, message) {
            console.error("Error al subir imagen:", message);
        },
        sending: function (file, xhr, formData) {
            // Verifica si formData es válido antes de agregar los datos
            if (formData) {
                // Agregar parámetros adicionales a formData
                const idPaciente = dame_id_paciente(); // Suponiendo que tienes esta función definida
                const idLugarAtencion = document.querySelector("#id_lugar_atencion").value;
                const idEspecialidad = document.querySelector("#id_especialidad").value;
                const idProfesional = document.querySelector('#id_profesional_fc').value;
                const idExamenRx = document.querySelector('#id_examen_oral_rx').value;
                const tipo_examen = 'endo';

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
                    id_examen: idExamenRx
                });
            } else {
                console.error("formData no está disponible");
            }
        }
    });
}

function guardar_nueva_pieza_ex_radio(counter){
    // Verifica los datos antes de procesar la cola de imágenes
    let numero_pieza = $('#rx_numero_pieza'+counter).val();
    let espacio_periodontal_aplical = $('#rx_esp_peri_apical'+counter).val();
    let hueso_alveolar_apical = $('#h_apical'+counter).val();
    let obs = $('#obs_ex_oral'+counter).val();
    let id_paciente = dame_id_paciente();
    let id_lugar_atencion = $('#id_lugar_atencion').val();
    let id_especialidad = $('#id_especialidad').val();
    let id_profesional = $('#id_profesional_fc').val();
    let id_ficha_atencion = $('#id_fc').val();

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
                swal({
                    icon:'success',
                    title:'Exito',
                    text:'Pieza agregada correctamente'
                });
            } else {
                $('#pieza_dentalrx').empty();
                $('#pieza_dentalrx').append(resp.mensaje);
            }
            $('#contenedor_examenes_oral_rx').empty();

            $('#id_examen_oral_rx').val(resp.rx.id);

            // Una vez que el envío de datos ha sido exitoso, procesamos la cola de imágenes
            if (dropzone.getQueuedFiles().length > 0) {
                console.log("Iniciando carga de imágenes...");
                // Desvinculamos el evento "queuecomplete" antes de procesar la cola
                dropzone.off("queuecomplete");

                // Procesar la cola de imágenes
                dropzone.processQueue();  // Esto procesará la cola y subirá las imágenes

                // Usamos un evento para esperar a que se complete la carga de imágenes
                dropzone.on("queuecomplete", function() {
                    // Una vez que la cola esté completa, podemos realizar más acciones si es necesario
                    console.log("Carga de imágenes completada.");
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
                initDropzone();  // Asegúrate de que la función initDropzone esté disponible
            }
        },
        error: function(error){
            console.log(error);
        }
    });
}




function ocultar_nueva_pieza_dental_rx_end(){
    $('#nueva_pieza_end').empty();
}

function guardar_nueva_pieza_ex_radio_end(count){
    let numero_pieza = $('#end_numero_pieza_'+count).val();
    let espacio_periodontal_aplical = $('#end_rx_esp_peri_apical'+count).val();
    let hueso_alveolar_apical = $('#end_h_apical'+count).val();
    let obs = $('#end_obs_ex_oral'+count).val();
    let id_paciente = dame_id_paciente();
    let id_lugar_atencion = $('#id_lugar_atencion').val();
    let id_especialidad = $('#id_especialidad').val();
    let id_profesional = $('#id_profesional_fc').val();
    let id_ficha_atencion = $('#id_fc').val();

    let valido = 1;
    let mensaje = '';

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


    let url = "{{ ROUTE('profesional.guardar_pieza_dental_examen_oral_rx_end') }}";

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
            tipo_examen:'endo'
        },
        url: url,
        success: function(resp){
            console.log(resp);
            if(resp.mensaje == 'OK'){
                $('#contenedor_pieza_dental_endorx_endo').empty();
                $('#contenedor_pieza_dental_endorx_endo').append(resp.v);

                $('#id_examen_oral_rx').val(resp.rx.id);

                $('#nueva_pieza_end').empty();
                // procesar cola del dropzone
                if (dropzoneEnd.getQueuedFiles().length > 0) {
                    console.log("Iniciando carga de imágenes...");
                    // Desvinculamos el evento "queuecomplete" antes de procesar la cola
                    dropzoneEnd.off("queuecomplete");

                    // Procesar la cola de imágenes
                    dropzoneEnd.processQueue();  // Esto procesará la cola y subirá las imágenes

                    // Usamos un evento para esperar a que se complete la carga de imágenes
                    dropzoneEnd.on("queuecomplete", function() {
                        // Una vez que la cola esté completa, podemos realizar más acciones si es necesario
                        console.log("Carga de imágenes completada.");
                    });
                } else {
                    console.log("No hay imágenes para cargar.");
                    alert("No has seleccionado imágenes para subir.");

                    // Si el Dropzone no está funcionando correctamente, puedes destruirlo y volver a inicializarlo
                    if (dropzoneEnd) {
                        // Destruir la instancia actual de Dropzone
                        dropzoneEnd.destroy();
                    }

                    // Re-inicializar el Dropzone nuevamente
                    initDropzoneEnd();  // Asegúrate de que la función initDropzone esté disponible
                }
            }
            mostrar_nueva_pieza_ex_radio_end(1000);
            swal({
                icon: 'success',
                title: 'Éxito',
                text: 'Pieza agregada correctamente'
            });
        },
        error: function(error){
            console.log(error);
        }
    })

}

</script>
