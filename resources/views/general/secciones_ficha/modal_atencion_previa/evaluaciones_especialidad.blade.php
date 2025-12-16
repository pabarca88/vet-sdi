<div id="m_eval_espec" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_consultaantLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="m_paciente" >Datos de consulta de: </h5>
                <button type="button" class="close" onclick="$('#m_eval_espec').modal('hide'); " data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="eval_especialidad_contenido">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger-light-c btn-sm" data-dismiss="modal" onclick="$('#m_eval_espec').modal('hide'); ">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function buscar_evaluaciones_especialidad(id_ficha_clinica){
        let url = "{{ ROUTE('profesional.buscar_evaluaciones_especialidad') }}";
        $.ajax({
            url: url,
            type: 'get',
            data: {
                id_ficha_atencion: id_ficha_clinica,
            },
            success: function(data){
                console.log(data);
                let paciente = data.paciente;
                let evaluaciones = data.evaluaciones;
                let nombreCompleto = `${paciente.nombres} ${paciente.apellido_uno} ${paciente.apellido_dos}`;

                // ✅ Mostrar nombre en el título del modal
                $('#m_paciente').html(`Datos de consulta de: <strong>${nombreCompleto}</strong>`);


                if (evaluaciones) {
                    let contenido = '<ul class="list-group">';
                    let tieneInformacion = false; // bandera

                    for (const [key, value] of Object.entries(evaluaciones)) {
                        if (
                            value !== null &&
                            value !== '' &&
                            value != 0 &&           // número
                            value !== '0' &&        // string
                            key !== 'id' &&
                            key !== 'id_profesional' &&
                            key !== 'id_profesional_fc' &&
                            key !== 'id_ficha_atencion' &&
                            key !== 'id_fc' &&
                            key !== 'id_fichas_atenciones' &&
                            key !== 'id_ficha_cirugia' &&
                            key !== 'id_paciente' &&
                            key !== 'id_lugar_atencion' &&
                            key !== 'otro_acompanante_relacion' &&
                            key !== 'id_paciente_fc' &&
                            key !== 'created_at' &&
                            key !== 'prevision_paciente_fc' &&
                            key !== 'rut_paciente_fc' &&
                            key !== 'updated_at' &&
                            key !== 'hora_medica' &&
                            key !== 'motivo' &&
                            key !== 'antecedentes' &&
                            key !== 'examen_fisico' &&
                            key !== 'descripcion_hipotesis' &&
                            key !== 'frecuencia_medicamento_cdiabet' &&
                            key !== 'frecuencia_medicamento_chipertension' &&
                            key !== 'cronicos' &&
                            !key.includes('length') &&
                            key !== 'dosis_medicamento_cdiabet' &&
                            key !== 'dosis_medicamento_chipertension' &&
                            key !== 'dosis_medicamento_cpeso' &&
                            key !== 'frecuencia_medicamento_cpeso' &&
                            key !== 'nuevo_antecedente' &&
                            key !== 'dosis_medicamentocron_cinsufren' &&
                            key !== '_token' &&
                            key !== 'estado'
                        ) {
                            const label = key.replace(/_/g, ' ').toUpperCase();
                            contenido += `<li class="list-group-item"><strong>${label}:</strong> ${value}</li>`;
                            tieneInformacion = true;
                        }
                    }

                    contenido += '</ul>';

                    // Mostrar resultado según si hay contenido útil o no
                    if (tieneInformacion) {
                        $('#eval_especialidad_contenido').html(contenido);
                    } else {
                        $('#eval_especialidad_contenido').html(`
                            <div class="alert alert-warning text-center" role="alert">
                                Sin información registrada en esta sección.
                            </div>
                        `);
                    }
                } else {
                    $('#eval_especialidad_contenido').html(`
                        <div class="alert alert-warning text-center" role="alert">
                            Sin información disponible.
                        </div>
                    `);
                }




                // abrir modal
                $('#m_eval_espec').modal('show');
            }
        });
    }
</script>
