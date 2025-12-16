<div id="modal_odontograma" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_odontograma"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_presupuesto">Historia del diente <span id="numero_pieza_historia"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="historia_odontograma"
                                class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Diagnóstico</th>
                                        <th class="text-center align-middle">Tratamiento</th>
                                        <th class="text-center align-middle">Tipo especialidad</th>
                                        <th class="text-center align-middle">Caras</th>
                                        <th class="text-center align-middle">Responsable de atención</th>
                                        <th class="text-center align-middle">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>

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
    function info_odontograma(pieza) {
        console.log(pieza);
        let url ="{{ route('dental.dame_pieza') }}";
        let id_paciente = dame_id_paciente();
        if(id_paciente == '' || id_paciente == null){
            id_paciente = $('#id_paciente').val();
        }
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                pieza: pieza,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: id_paciente,
                _token: "{{ csrf_token() }}"
            },
            success: function (response)  {
                console.log(response);
                // Mapea los datos si los nombres de las claves no coinciden
                const tipoExamenMap = {
                    1: 'Gral',
                    2: 'Endodoncia',
                    3: 'Odontopediatría' // Ejemplo adicional
                };
            // Mapea los datos si los nombres de las claves no coinciden
            const data = response.map(item => ({
                fecha: item.fecha || 'N/A', // Asigna valor por defecto si falta
                diagnostico:  item.diagnostico ? item.diagnostico : 'N/A',
                tratamiento:  item.tratamiento ? item.tratamiento : 'N/A',
                tipo_examen: tipoExamenMap[item.tipo_examen] || 'Otro',
                caras: item.diagnosticocaras || 'N/A',
                responsable: item.profesional || 'N/A',
                estado: item.estado == 1 ? 'TERMINADO' : 'EN ESPERA'
            }));

            // Inicializa o actualiza la tabla
            $('#historia_odontograma').DataTable({
                destroy: true,
                data: data,
                columns: [
                    { data: 'fecha' },
                    { data: 'diagnostico' },
                    { data: 'tratamiento' },
                    { data: 'tipo_examen' },
                    { data: 'caras' },
                    { data: 'responsable' },
                    { data: 'estado' }
                ],
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                }
            });
            $('#numero_pieza_historia').html(` - Pieza N° ${pieza}`);
        },
        })
        $('#modal_odontograma').modal('show');
    }
</script>
