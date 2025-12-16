<div id="m_cons_examen" class="modal fade" tabindex="-1" role="dialog"aria-labelledby="m_cons_examenLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="id_ficha_examen">Exámenes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="$('#m_cons_examen').modal('hide');">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table id="table_atecion_previa_tabla_examen_paciente" class="display table table-striped  dt-responsive nowrap table-sm" style="width:100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Nombre</th>
                                <th>Prioridad</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </form>
                <!--fin autollenado-->
            </div>

        </div>
    </div>
</div>
<script>
    {{--  function buscar_examenes() {
        $('#m_cons_examen').modal('show');
    }  --}}

    function buscar_examenes(id_ficha_clinica)
    {

        {{-- url = "{{ route('buscar.examenes_ficha') }}"; --}}
        url = "{{ route('examenes.ver_examenes') }}";
        id_ficha = id_ficha_clinica;
        $('#table_atecion_previa_tabla_examen_paciente tbody').html('');

        $.ajax({
                url: url,
                type: "get",
                data: {
                    id_ficha_atencion: id_ficha
                },
                dataType: "json",
            })
            .done(function(data) {
                if (data != null) {

                    $('#id_ficha_examen').text('Exámenes de: ' + data.paciente.nombre_paciente);
                    if(data.estado == 1)
                    {
                        $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                        var j = 1; //contador para asignar id al boton que borrara la fila
                        $.each(data.registros, function(index, value)
                        {
                            var fecha = formatDate(value.created_at);
                            //var salida = formato(fecha);
                            var examen = value.examen;
                            var tipo_examen = value.tipo_examen;
                            var prioridad = value.id_prioridad;

                            switch (prioridad) {
                                case 1:
                                    prioridad = 'Baja';
                                    break;
                                case 2:
                                    prioridad = 'Media';
                                    break;
                                case 3:
                                    prioridad = 'Alta';
                                    break;
                                case 4:
                                    prioridad = 'Urgente';
                                    break;

                                default:
                                    prioridad = 'Sin Prioridad';
                                    break;
                            }

                            var fila = '';
                            fila += '<tr class="tr_examen" id="row' + j + '">';
                            fila += '    <td class="text-center align-middle">' + fecha + '</td>';
                            fila += '    <td class="text-center align-middle">' + examen + '</td>';
                            fila += '    <td class="text-center align-middle">' + tipo_examen + '</td>';
                            fila += '    <td class="text-center align-middle">' + prioridad + '</td>';
                            fila += '</tr>'; //esto seria lo que contendria la fila

                            j++;

                            $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);

                        });
                    }
                    else
                    {
                        $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                        var fila = '<tr><td colspan="4"><span><h5>No existen registros</h5></span></td></tr>';
                        $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);
                    }

                }
                else
                {
                    $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                    var fila = '<tr><td colspan="4"><span><h5>No existen registros</h5></span></td></tr>'
                    $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);
                }
                $('#m_cons_examen').modal('show');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

            $('#table_atecion_previa_tabla_examen_paciente').dataTable().fnClearTable();
            $('#table_atecion_previa_tabla_examen_paciente').dataTable().fnDestroy();
            $('#table_atecion_previa_tabla_examen_paciente').DataTable({
                responsive: true,
                "bPaginate": false,
            });

    }
</script>


