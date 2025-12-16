<div id="m_cons_receta_fmu" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_receta_fmuLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="id_ficha_receta"
                    style="font-size: 1.3rem; color: #3366CC;"> </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_receta').modal('hide'); ">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table id="tabla_atenciones_previas_receta" class="display table table-striped table-hover dt-responsive nowrap pb-4"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">Medicamento</th>
                                <th class="text-center align-middle">Presentacion</th>
                                <th class="text-center align-middle">Posología</th>
                                <th class="text-center align-middle">Vía</th>
                                <th class="text-center align-middle">Periodo</th>
                                <th class="text-center align-middle">Uso Crónico</th>
                                <th class="text-center align-middle">Cantidad</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </form>
                <!--fin autollenado-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_receta').modal('hide'); ">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    {{--  function buscar_receta_fmu() {
        $('#m_cons_receta_fmu').modal('show');
    }  --}}
    function buscar_receta_fmu(id_ficha_clinica)
        {

            {{--  url = '{{ route('buscar.recetas') }}';  --}}
            url = "{{ route('detalle_receta.ver_medicamentos') }}";
            id_ficha = id_ficha_clinica;
            $('#tabla_receta tbody').empty();

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha: id_ficha
                    },
                    dataType: "json",
            })
            .done(function(data)
            {
                if (data != null)
                {

                    $('#id_ficha_receta').text('Receta de Paciente: ' + data.paciente.nombre_paciente);

                    if(data.estado == 1)
                    {
                        $('#tabla_atenciones_previas_receta tbody').html('');
                        $.each(data.registros, function(index, value)
                        {
                            var fecha = formatDate(value.created_at);
                            //var salida = formato(fecha);
                            var medicamento = value.producto;
                            var presentacion = value.presentacion;
                            var posologia = value.posologia;
                            var via_administracion = value.via_administracion;
                            var periodo = value.periodo;
                            var uso_cronico = value.uso_cronico;
                            var cantidad_compr = value.cantidad_compra;

                            if(uso_cronico == 1)
                                uso_cronico = 'USO CRONICO';
                            else
                                uso_cronico = 'NORMAL';

                            var j = 1; //contador para asignar id al boton que borrara la fila
                            var fila =  '<tr class="tr_receta" id="row' + j + '">'+
                                            '<td>' + fecha + '</td>'+
                                            '<td>' + medicamento + '</td>'+
                                            '<td>' + presentacion + '</td>'+
                                            '<td>' + posologia + '</td>'+
                                            '<td>' + via_administracion + '</td>'+
                                            '<td>' + periodo + '</td>'+
                                            '<td>' + uso_cronico + '</td>'+
                                            '<td>' + cantidad_compr + '</td>'+
                                        '</tr>';
                                        //esto seria lo que contendria la fila

                            $('#tabla_atenciones_previas_receta tbody').append(fila);
                        });
                    }
                    else
                    {
                        $('#tabla_atenciones_previas_receta tbody').html('');
                        var fila = '<tr><td colspan="8"><span><h5>no existen registros</h5></span></td></tr>';
                        $('#tabla_atenciones_previas_receta tbody').append(fila);
                    }

                } else {
                    $('#tabla_atenciones_previas_receta tbody').html('');
                    var fila = '<tr><td colspan="8"><span><h5>no existen registros</h5></span></td></tr>';
                    $('#tabla_atenciones_previas_receta tbody').append(fila);
                }
                $('#m_cons_receta_fmu').modal('show');
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

            $('#tabla_atenciones_previas_receta').dataTable().fnClearTable();
            $('#tabla_atenciones_previas_receta').dataTable().fnDestroy();
            $('#tabla_atenciones_previas_receta').DataTable({
                responsive: true,
                "bPaginate": false,
            });
        }
</script>
