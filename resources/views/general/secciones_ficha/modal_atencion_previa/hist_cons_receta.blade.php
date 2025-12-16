<div id="m_cons_receta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_recetaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title" id="id_ficha_receta"> Recetas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_receta').modal('hide'); ">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-1 row-cols-md-2" id="seccion_medicamentos">
                    <div class="col-sm-12 col-md-12 col-xl-12">
                            {{-- <div class="col mb-4">
                                <div class="card-previas social-card">
                                    <div class="card-body p-2">
                                        <div class="row d-flex justify-content-start">
                                            <div class="col-1">
                                                <img class="wid-35" src="{{ asset('images/iconos/otros/medicamento-light.svg') }}">
                                            </div>
                                            <div class="col pl-4">
                                                <small class="text-secondary pl-1">Medicamento</small><br>
                                                <h5 class="text-c-blue">Aspirina 500</h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p class="m-b-0"><strong>Presentación</strong></p>
                                                <p class="mb-2">20 comp.</p>
                                                <p class="m-b-0"><strong>Vía</strong></p>
                                                <p class="mb-2">Vía Oral</p>
                                                <p class="m-b-0"><strong>Uso crónico</strong></p>
                                                <p>Normal</p>
                                            </div>
                                              <div class="col">
                                                <p class="m-b-0"><strong>Posología</strong></p>
                                                <p class="mb-2">1 cada 24 horas</p>
                                                <p class="m-b-0"><strong>Periodo</strong></p>
                                                <p class="mb-2">30 días</p>
                                                <p class="m-b-0"><strong>Cantidad</strong></p>
                                                <p>(2) Dos cajas</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabla_atenciones_previas_receta').DataTable({
           responsive: true,
       });
   });
</script>
<script>
    {{--  function buscar_receta () {
        $('#m_cons_receta').modal('show');
    }  --}}
    function buscar_receta(id_ficha_clinica) {

        url = '{{ route('profesional.receta.ver') }}';
        id_ficha = id_ficha_clinica;
        // $('#tabla_receta tbody').empty();
        $('#seccion_medicamentos').empty();

        $.ajax({
            url: url,
            type: "get",
            data: {
                id_ficha: id_ficha
            },
            dataType: "json",
        })
        .done(function(data) {
            if (data != null) {

                console.log(typeof data.paciente);
                if(typeof data.paciente != 'undefined')
                $('#id_ficha_receta').text('Receta de Paciente: ' + data.paciente.nombres + ' ' + data.paciente.apellido_uno + ' ' + data.paciente.apellido_dos);
                else
                $('#id_ficha_receta').text('Receta de Paciente');

                if(data.estado == 1)
                {
                    console.log(data);
                    // $('#tabla_atenciones_previas_receta tbody').html('');
                    $('#seccion_medicamentos').html('');
                    if(data.registros != '')
                    {
                        $.each(data.registros, function(index, value)
                        {
                            var fecha = formatDate(value.created_at);

                            $.each(value.detalle, function(index2, value2)
                            {
                                //var salida = formato(fecha);
                                var medicamento = value2.producto;
                                var presentacion = value2.presentacion;
                                var posologia = value2.posologia;
                                var via_administracion = value2.via_administracion;
                                var periodo = value2.periodo;
                                var uso_cronico = value2.uso_cronico;
                                var cantidad_compr = value2.cantidad_compra;

                                if(uso_cronico == 1)
                                    uso_cronico = 'USO CRÓNICO';
                                else
                                    uso_cronico = 'NORMAL';

                                var fila =  '';
                                fila += '<div class="col mb-4">';
                                fila += '    <div class="card-previas social-card">';
                                fila += '        <div class="card-body p-2">';
                                fila += '            <div class="row d-flex justify-content-start">';
                                fila += '                <div class="col-1">';
                                fila += '                    <img class="wid-35" src="{{ asset('images/iconos/otros/medicamento-light.svg') }}"> ';
                                fila += '                </div>';
                                fila += '                <div class="col pl-4">';
                                fila += '                    <small class="text-secondary pl-1">Medicamento</small><br>';
                                fila += '                    <h5 class="text-c-blue">';
                                fila += medicamento;
                                fila += '                    </h5>';
                                fila += '                    ';
                                fila += '                </div>';
                                fila += '            </div>';
                                fila += '            <div class="row">';
                                fila += '                <div class="col">';
                                fila += '                    <p class="m-b-0"><strong>Presentación</strong></p>';
                                fila += '                    <p class="mb-2">'+presentacion+'</p>';
                                fila += '                    <p class="m-b-0"><strong>Vía</strong></p>';
                                fila += '                    <p class="mb-2">'+via_administracion+'</p> ';
                                fila += '                    <p class="m-b-0"><strong>'+uso_cronico+'</strong></p>';
                                fila += '                    <p>Normal</p>                                     ';
                                fila += '                </div>';
                                fila += '                <div class="col">';
                                fila += '                    <p class="m-b-0"><strong>Posología</strong></p>';
                                fila += '                    <p class="mb-2">'+posologia+'</p> ';
                                fila += '                    <p class="m-b-0"><strong>Periodo</strong></p>';
                                fila += '                    <p class="mb-2">'+periodo+'</p> ';
                                fila += '                    <p class="m-b-0"><strong>Cantidad</strong></p>';
                                fila += '                    <p>'+cantidad_compr+'</p>';
                                fila += '                </div>';
                                fila += '            </div>';
                                fila += '        </div>';
                                fila += '    </div>';
                                fila += '</div>';
                                $('#seccion_medicamentos').append(fila);

                            });
                        });
                    }
                    else
                    {
                        $('#seccion_medicamentos').empty();
                        var fila = '<h5>No existen registros</h5>';
                        $('#seccion_medicamentos').append(fila);
                    }
                }
                else
                {
                    $('#seccion_medicamentos').empty();
                    var fila = '<h5>No existen registros</h5>';
                    $('#seccion_medicamentos').append(fila);
                }

            } else {
                $('#seccion_medicamentos').empty();
                var fila = '<h5>no existen registros</h5>';
                $('#seccion_medicamentos').append(fila);
            }
            $('#m_cons_receta').modal('show');
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }
    function buscar_receta_ficha(id) {
        console.log(id);
    };
</script>

