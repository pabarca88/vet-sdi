<div id="m_cons_archivos_fmu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_archivos_fmuLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="m_cons_archivos_fmuLabel">Documentos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_archivos_fmu').modal('hide');" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_atenciones_previas_archivos_fmu"class="display table table-striped dt-responsive nowrap table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Tipo</th>
                            <th>Ver</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <!--fin autollenado-->
            </div>
            <div class="modal-footer">
                <button type="button mt-5" class="btn btn-danger-light-c" data-dismiss="modal" onclick="$('#m_cons_archivos_fmu').modal('hide');">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>

    function buscar_archivo_fmu(id_ficha_clinica)
    {

        let url = "{{ route('ficha_atencion.ver_archivos') }}";
        let id_ficha = id_ficha_clinica;
        $('#table_atenciones_previas_archivos_fmu tbody').html('');

        $.ajax({
                url: url,
                type: "get",
                data: {
                    id_ficha_atencion_soli: id_ficha
                },
                dataType: "json",
            })
            .done(function(data) {
                if (data != null) {

                    $('#m_cons_archivos_fmuLabel').text('Documentos de esta consulta del Paciente: ' + data.paciente.nombre);
                    if(data.estado == 1)
                    {
                        $('#table_atenciones_previas_archivos_fmu tbody').html('');
                        var j = 1; //contador para asignar id al boton que borrara la fila
                        $.each(data.registros, function(index, value)
                        {
                            var fecha = formatDate(value.fecha);
                            var tipo = value.tipo;
                            var id = value.id;
                            var id_ficha_archivo = value.id_ficha;
                            var url = value.url;

                            var metodo='';
                            switch (tipo) {
                                case 'Certificado de Reposo':
                                    metodo = 'ver_pdf_certificado_reposo'+'('+id_ficha_archivo+')';
                                    break;
                                case 'Interconsulta':
                                    metodo = 'ver_pdf_interconsulta'+'('+id+')';
                                    break;
                                case 'Informen Medico':
                                    metodo = 'ver_pdf_informe_medico'+'('+id_ficha_archivo+')';
                                    break;
                                case 'Uso Personal':
                                    metodo = 'ver_pdf_uso_personal'+'('+id_ficha_archivo+')';
                                    break;

                                default:
                                    metodo = '';
                                    break;
                            }

                            var fila = '';
                            fila += '<tr class="tr_examen" id="row' + j + '">';
                            fila += '    <td class="text-center align-middle">' + fecha + '</td>';
                            fila += '    <td class="text-center align-middle">' + tipo + '</td>';
                            if(metodo != '')
                                fila += '    <td class="text-center align-middle"><div onclick="'+metodo+'; $(\'#m_cons_archivos_fmu\').modal(\'hide\');" class="btn btn-success btn-sm has-ripple"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                            else
                                fila += '    <td class="text-center align-middle"><div class="btn btn-success btn-sm has-ripple disabled"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                            fila += '</tr>';

                            j++;

                            $('#table_atenciones_previas_archivos_fmu tbody').append(fila);

                        });
                    }
                    else
                    {
                        $('#table_atenciones_previas_archivos_fmu tbody').html('');
                        var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>';
                        $('#table_atenciones_previas_archivos_fmu tbody').append(fila);
                    }

                }
                else
                {
                    $('#table_atenciones_previas_archivos_fmu tbody').html('');
                    var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>'
                    $('#table_atenciones_previas_archivos_fmu tbody').append(fila);
                }
                $('#m_cons_archivos_fmu').modal('show');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

            $('#table_atenciones_previas_archivos_fmu').dataTable().fnClearTable();
            $('#table_atenciones_previas_archivos_fmu').dataTable().fnDestroy();
            $('#table_atenciones_previas_archivos_fmu').DataTable({
                responsive: true,
                "bPaginate": false,
                "searching": false
            });

    }
</script>
