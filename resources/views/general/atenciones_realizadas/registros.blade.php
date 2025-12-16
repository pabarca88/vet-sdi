
{{--
@if(isset($fade))
    <!-- <div class="tab-pane fade-in" id="pills-atencion-previas" role="tabpanel" aria-labelledby="pills-atencion-previas-tab"> -->
@else
    <!-- <div class="tab-pane fade" id="pills-atencion-previas" role="tabpanel" aria-labelledby="pills-atencion-previas-tab"> -->
@endif
--}}

    <div class="user-card mt-0"style="background-color: #ecf0f5 !important;">
        <div class="col-md-12 py-0 px-2 shadow-none">
            <div class="row mx-0">
                <div class="col-md-12">
                </div>
            </div>
            <div class="row bg-white shadow-sm rounded mx-3 mt-4">
                <div class="col-sm-12 col-md-12">
                    @if(isset($titulo) && $titulo == 'NO')
                        {{--  nada  --}}
                    @else
                        <div class="row">
                            <div class="col-md-12 mb-0 pt-3">
                                <h6 class="f-16 text-c-blue">Historial de Atenciones</h6>
                                <hr>
                            </div>
                        </div>
                    @endif
                    <div class="row mt-3">
                        <div class="col-sm-12 pb-4">
                            <table id="table_atenciones_profesional" class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Profesional</th>
                                        <th class="text-center align-middle">Diagnóstico</th>
                                        <th class="text-center align-middle">Recetas</th>
                                        <th class="text-center align-middle">Exámenes</th>
                                        <!--<th class="text-center align-middle">Archivos </th>
                                        <th class="text-center align-middle">Ficha</th>-->
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (isset($fichas) && $fichas->count() > 0)
                                        @foreach ($fichas as $f)
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ \Carbon\Carbon::parse($f->created_at)->format('d/m/Y') }}
                                                </td>

                                                <td class="text-center align-middle">{{ $f->profesional->nombre }} {{ $f->profesional->apellido_uno }} {{ $f->profesional->apellido_dos }}<br>
													@foreach ($especialidad as $esp)
														@if($esp->id==$f->profesional->id_especialidad)
														<b>{{ $esp->nombre }}<b><br>
														@endif
													@endforeach    
													@foreach ($sub_tipo_especialidad as $sub_esp)
														@if($sub_esp->id==$f->profesional->id_sub_tipo_especialidad)
														<b>{{ $sub_esp->nombre }}<b><br>
														@endif
													@endforeach 
                                                </td>

                                                <td class="text-center align-middle">{{ $f->hipotesis_diagnostico }}</td>

                                                <td class="text-center align-middle">
                                                    <a class="badge badge-light-warning"  @if (isset($f->id)) onclick="buscar_receta({{ $f->id }});" @endif><i class="feather icon-file-plus"></i> Ver</a>
                                                </td>

                                                <td class="text-center align-middle">
                                                    <a class="badge badge-light-success" @if (isset($f->id)) onclick="buscar_examenes({{ $f->id }});" @endif><i class="feather icon-activity"></i> Ver</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <span>
                                            <h5>no existen registros</h5>
                                        </span>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->

<!-- modales -->
<div id="m_consultaant" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_consultaantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="m_consultaantLabel" style="font-size: 1.3rem; color: #3366CC;" onclick="$('#m_consultaant').modal('hide'); ">Datos de Consulta de: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <div class=" form-group row">
                        <h5 class="text-c-blue mt-5 mb-4" style="font-size: 1.1rem;">
                            Datos Generales
                        </h5>

                        <div class="row col-md-12">
                            <div class="row col-md-5">
                                <label for="ExFísico">
                                    <h5><b>Motivo de Consulta: </b></h5>
                                </label>
                            </div>
                            <div class="row col-md-7">
                                <span>
                                    <h6 id="label_motivo"></h6>
                                </span>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="row col-md-5">
                                <label for="ExFísico">
                                    <h5><b>Examen Físico: </b></h5>
                                </label>
                            </div>
                            <div class="row col-md-7">
                                <span>
                                    <h6 id="label_examen_fisico"></h6>
                                </span>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="row col-md-5">
                                <label for="ExFísico">
                                    <h5><b>Antecedentes de Consulta: </b></h5>
                                </label>
                            </div>
                            <div class="row col-md-7">
                                <span>
                                    <h6 id="label_antecedentes"></h6>
                                </span>
                            </div>

                        </div>

                        <div class="row col-md-12">
                            <div class="row col-md-5">
                                <label for="ExFísico">
                                    <h5><b>Diagnostico de Consulta: </b></h5>
                                </label>
                            </div>
                            <div class="row col-md-7">
                                <span>
                                    <h6 id="label_diagnostico"></h6>
                                </span>
                            </div>

                        </div>

                    </div>

                    <div class=" form-group row">

                    </div>

                </div>
                {{-- <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="MotConsulta">Motivo
                                    de Consulta</label>
                                <!--fin autollenado-->
                                <input id="MotConsulta" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </form> --}}
                {{-- <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="AntConsulta">Antecedentes</label>
                                <!--fin autollenado-->
                                <input id="AntConsulta" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </form> --}}
                {{-- <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="ExFísico">Examen
                                    Físico</label>
                                <!--fin autollenado-->
                                <input id="ExFísico" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </form> --}}
                {{-- <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="Dignóstico">Dignóstico</label>
                                <!--fin autollenado-->
                                <input id="Dignóstico" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </form> --}}
                {{-- <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="Receta">Receta</label>
                                <!--fin autollenado-->
                                <input id="Receta" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </form>
                <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="Examenes">Examenes</label>
                                <!--fin autollenado-->
                                <input id="Examenes" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </form> --}}
                <!--fin autollenado-->

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_consultaant').modal('hide'); ">Cerrar</button>

                </div>

            </div>
        </div>
    </div>
</div>

<div id="m_cons_ex" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_exLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="m_cons_exLabel"
                    style="font-size: 1.3rem; color: #3366CC;">Examenes Solicitados
                    el.... </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table id="tabla-1"
                        class="display table table-striped table-hover dt-responsive nowrap pb-4"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Urgencia</th>
                                <th class="text-center align-middle">Nombre</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center align-middle">27/07/2021</td>
                                <td class="text-center align-middle">Sangre</td>
                                <td class="text-center align-middle">Normal</td>
                                <td class="text-center align-middle">Hemograma y vhs
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">27/07/2021</td>
                                <td class="text-center align-middle">
                                    Otorrinolaríngologico</td>
                                <td class="text-center align-middle">Normal</td>
                                <td class="text-center align-middle">Rinomanometría
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">27/07/2021</td>
                                <td class="text-center align-middle">Sangre</td>
                                <td class="text-center align-middle">Urgente</td>
                                <td class="text-center align-middle">Grupo Sanguíneo
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <!--fin autollenado-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- recetas --}}
<div id="m_cons_receta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_recetaLabel" aria-hidden="true">
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

{{-- examenes --}}
<div id="m_cons_examen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_examenLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="id_ficha_examen" style="font-size: 1.3rem; color: #3366CC;"> </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_examen').modal('hide'); ">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table id="table_atecion_previa_tabla_examen_paciente" class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Nombre</th>
                                <th class="text-center align-middle">Prioridad</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </form>
                <!--fin autollenado-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_examen').modal('hide'); ">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- archivos --}}
<div id="m_cons_archivos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_archivosLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="m_cons_archivosLabel">Documentos de esta consulta del Paciente:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_archivos').modal('hide');" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table_atenciones_previas_archivos"class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">Fecha</th>
                            <th class="text-center align-middle">Tipo</th>
                            <th class="text-center align-middle">Ver</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <!--fin autollenado-->
                <div class="modal-footer">
                    <button type="button mt-5" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_archivos').modal('hide');">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function buscar_receta(id_ficha_clinica) 
    {

{{--  url = '{{ route('buscar.recetas') }}';  --}}
url = '{{ route('detalle_receta.ver_medicamentos') }}';
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
    .done(function(data) {
        if (data != null) {

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
        $('#m_cons_receta').modal('show');
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
                            var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>';
                            $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);
                        }

                    }
                    else
                    {
                        $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                        var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>'
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


        function buscar_archivos(id_ficha_clinica)
        {

            url = "{{ route('ficha_atencion.ver_archivos') }}";
            id_ficha = id_ficha_clinica;
            $('#table_atenciones_previas_archivos tbody').html('');

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

                        $('#m_cons_archivosLabel').text('Documentos de esta consulta del Paciente: ' + data.paciente.nombre);
                        if(data.estado == 1)
                        {
                            $('#table_atenciones_previas_archivos tbody').html('');
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
                                        metodo = 'ver_pdf_certificado_reposo';
                                        break;
                                    case 'Interconsulta':
                                        metodo = '';
                                        break;
                                    case 'Informen Medico':
                                        metodo = 'ver_pdf_informe_medico';
                                        break;
                                    case 'Uso Personal':
                                        metodo = 'ver_pdf_uso_personal';
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
                                    fila += '    <td class="text-center align-middle"><div onclick="'+metodo+'('+id_ficha_archivo+'); $(\'#m_cons_archivos\').modal(\'hide\');" class="btn btn-success btn-sm has-ripple"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                                else
                                    fila += '    <td class="text-center align-middle"><div class="btn btn-success btn-sm has-ripple disabled"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                                fila += '</tr>';

                                j++;

                                $('#table_atenciones_previas_archivos tbody').append(fila);

                            });
                        }
                        else
                        {
                            $('#table_atenciones_previas_archivos tbody').html('');
                            var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>';
                            $('#table_atenciones_previas_archivos tbody').append(fila);
                        }

                    }
                    else
                    {
                        $('#table_atenciones_previas_archivos tbody').html('');
                        var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>'
                        $('#table_atenciones_previas_archivos tbody').append(fila);
                    }
                    $('#m_cons_archivos').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

                $('#table_atenciones_previas_archivos').dataTable().fnClearTable();
                $('#table_atenciones_previas_archivos').dataTable().fnDestroy();
                $('#table_atenciones_previas_archivos').DataTable({
                    responsive: true,
                    "bPaginate": false,
                });



        }

        function  buscar_ficha_atencion(id_ficha_atencion)
        {
            let url = "{{ route('ficha_clinica.get_ficha') }}";


            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_ficha_atencion: id_ficha_atencion,
                    },
                })
                .done(function(response) {

                    if (response != '') {

                        if (response['estado'] == '1')
                        {
                            $('#m_consultaantLabel').html( 'Datos de Consulta de: '+response.paciente.nombre);
                            $('#label_motivo').html(response.registros.motivo);
                            $('#label_examen_fisico').html(response.registros.examen_fisico);
                            $('#label_antecedentes').html(response.registros.antecedentes);
                            $('#label_diagnostico').html(response.registros.hipotesis_diagnostico);


                        } else {
                            $('#label_motivo').html('');
                            $('#label_examen_fisico').html('');
                            $('#label_antecedentes').html('');
                            $('#label_diagnostico').html('');
                        }
                        $('#m_consultaant').modal('show');
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                });
        }

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join('-');
        }

</script>