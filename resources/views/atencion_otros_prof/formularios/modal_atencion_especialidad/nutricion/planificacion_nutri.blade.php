<div id="plan_nutri" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="plan_nutri" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_eval_hab_preart">Planificación Nutrición</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_plan_nutri">
                    <div id="planificacion" class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <h6 class="form_fono">INDICACIONES AL PACIENTE</h6>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-4 mt-2">
                            <label class="floating-label-activo-sm">Fecha Inicio Tratamiento</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_inicio_tratamiento" id="fecha_inicio_tratamiento">
                        </div>
                        <div class="col-sm-4 mt-2">
                            <label class="floating-label-activo-sm">Diagnóstico</label>
                            <input type="text" class="form-control form-control-sm" name="diagnostico_tratamiento" id="diagnostico_tratamiento">
                        </div>
                        <div class="col-sm-4 mt-2">
                            <label class="floating-label-activo-sm">Tratamiento a seguir</label>
                            <input type="text" class="form-control form-control-sm" name="tratamiento_seguir" id="tratamiento_seguir">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="form-row">
                        <div class="col-sm-3 mt-2">
                            <label class="floating-label-activo-sm">Número de Sesiones</label>
                            <input type="number" class="form-control form-control-sm" name="numero_sesiones" id="numero_sesiones">
                        </div>
                        <div class="col-sm-9 mt-2">
                            <label class="floating-label-activo-sm">Objetivos</label>
                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="objetivos" id="objetivos"></textarea>
                        </div>
                        <br>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-shadow btn-warning has-ripple" onclick="agendar_planificacion_nutri()" >Agendar</button>
                <button type="button" class="btn btn-info" onclick="guardar_planificacion_nutri()">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
function guardar_planificacion_nutri() {
    // Captura de valores
    const fechaInicio = $('#fecha_inicio_tratamiento').val();
    const diagnostico = $('#diagnostico').val().trim();
    const fechaHora = $('#fecha_hora_tratamiento').val();
    const sesiones = $('#numero_sesiones').val();
    const objetivos = $('#objetivos').val().trim();

    // Validación simple
    if (!fechaInicio || !diagnostico || !fechaHora || !sesiones || !objetivos) {
        swal({
            title:'error',
            text:'Todos los campos son obligatorios',
            icon:'error'
        });
        return;
    }

    const data = {
        fecha_inicio_tratamiento: fechaInicio,
        diagnostico: diagnostico,
        fecha_hora_tratamiento: fechaHora,
        numero_sesiones: sesiones,
        objetivos: objetivos,
        _token: '{{ csrf_token() }}'
    };

    $.ajax({
        url: '{{ route("profesional.guardar_planificacion_nutri") }}', // Reemplaza con la ruta real
        method: 'POST',
        data: data,
        success: function(response) {
            return console.log(response);
            alert('✅ Planificación guardada correctamente.');
            $('#plan_nutri').modal('hide');
            // Si quieres, limpia el formulario:
            $('#form_plan_nutri')[0].reset();
        },
        error: function(xhr) {
            alert('❌ Ocurrió un error al guardar la planificación.');
            console.error(xhr.responseText);
        }
    });
}

function agendar_planificacion_nutri() {
   console.log('en construccion');
}
</script>

