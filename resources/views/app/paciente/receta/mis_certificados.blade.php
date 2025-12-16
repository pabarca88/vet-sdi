@extends('template.paciente.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Mis certificados</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta') }}" data-toggle="tooltip" data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta.certificado') }}">Mis certificados</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-c-blue f-20 ">Mis certificados</h4>
                    </div>
                    <div class="card-body">
                        @php
                            // echo json_encode($certificado_reposo);
                            // echo '<br>**********************************<br>';
                            // echo json_encode($interconsulta);
                            // echo '<br>**********************************<br>';
                            // echo json_encode($informe_medico);
                            // echo '<br>**********************************<br>';
                            // echo json_encode($uso_personal);
                            // echo '<br>**********************************<br>';
                        @endphp
                        <table id="tabla_certificado_paciente_ro" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Profesional</th>
                                    <th>Tipo de certificado</th>
                                    <th>Certificado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($certificado_reposo))
                                    @foreach( $certificado_reposo as $cr )
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($cr->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <strong>{{ $cr->profesional->nombre }} {{ $cr->profesional->apellido_uno }} {{ $cr->profesional->apellido_dos }} </strong>
                                                <br>
                                                @if (isset($cr->profesional->SubTipoEspecialidad->nombre))
                                                    <span style="font-size: 9px;">{{ mb_strtoupper( $cr->profesional->TipoEspecialidad->nombre ).' '.mb_strtoupper( $cr->profesional->SubTipoEspecialidad->nombre ) }}</span>
                                                @else
                                                    {{ mb_strtoupper( $cr->profesional->TipoEspecialidad->nombre ) }}
                                                @endif
                                                {{-- {{ mb_strtoupper( $cr->profesional->especialidad->nombre ) }} --}}
                                                {{-- {{ mb_strtoupper( $cr->profesional->TipoEspecialidad->nombre ) }} --}}
                                                {{-- {{ mb_strtoupper( $cr->profesional->SubTipoEspecialidad->nombre ) }}     --}}
                                            </td>
                                            <td>Certificado de Reposo</td>
                                            <td>
                                                <button type="button" class="btn btn-secondary-light-c btn-xxs" onclick="ver_pdf_certificado_reposo({{$cr->id_ficha_atencion}})"><i class="feather icon-file"></i> Ver certificado</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                @if(isset($interconsulta))
                                    @foreach( $interconsulta as $ic )
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($ic->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <strong>Solicitado por: {{ $ic->profesional->nombre }} {{ $ic->profesional->apellido_uno }} {{ $ic->profesional->apellido_dos }} </strong>
                                                <br>
                                                @if (isset($ic->profesional->SubTipoEspecialidad->nombre))
                                                    <span style="font-size: 9px;">{{ mb_strtoupper( $ic->profesional->TipoEspecialidad->nombre ).' '.mb_strtoupper( $ic->profesional->SubTipoEspecialidad->nombre ) }}</span>
                                                @else
                                                    {{ mb_strtoupper( $ic->profesional->TipoEspecialidad->nombre ) }}
                                                @endif

                                                @if (isset($ic->profesional_resp))
                                                    <hr>
                                                    <strong>Respuesta: {{ $ic->profesional_resp->nombre }} {{ $ic->profesional_resp->apellido_uno }} {{ $ic->profesional_resp->apellido_dos }} </strong>
                                                    <br>
                                                    @if (isset($ic->profesional_resp->SubTipoEspecialidad->nombre))
                                                        <span style="font-size: 9px;">{{ mb_strtoupper( $ic->profesional_resp->TipoEspecialidad->nombre ).' '.mb_strtoupper( $ic->profesional_resp->SubTipoEspecialidad->nombre ) }}</span>
                                                    @else
                                                        {{ mb_strtoupper( $ic->profesional_resp->TipoEspecialidad->nombre ) }}
                                                    @endif
                                                @endif
                                                {{-- {{ mb_strtoupper( $ic->profesional_resp->especialidad->nombre ) }} --}}
                                                {{-- {{ mb_strtoupper( $ic->profesional_resp->TipoEspecialidad->nombre ) }} --}}
                                                {{-- {{ mb_strtoupper( $ic->profesional_resp->SubTipoEspecialidad->nombre ) }}     --}}
                                            </td>
                                            <td>Interconsulta</td>
                                            <td>
                                                <button type="button" class="btn btn-secondary-light-c btn-xxs" onclick="ver_pdf_interconsulta({{ $ic->id }});"><i class="feather icon-file"></i> Ver certificado</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                @if(isset($informe_medico))
                                    @foreach( $informe_medico as $im )
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($im->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <strong>{{ $im->profesional->nombre }} {{ $im->profesional->apellido_uno }} {{ $im->profesional->apellido_dos }} </strong>
                                                <br>
                                                @if (isset($im->profesional->SubTipoEspecialidad->nombre))
                                                    <span style="font-size: 9px;">{{ mb_strtoupper( $im->profesional->TipoEspecialidad->nombre ).' '.mb_strtoupper( $im->profesional->SubTipoEspecialidad->nombre ) }}</span>
                                                @else
                                                    {{ mb_strtoupper( $im->profesional->TipoEspecialidad->nombre ) }}
                                                @endif
                                                {{-- {{ mb_strtoupper( $im->profesional->especialidad->nombre ) }} --}}
                                                {{-- {{ mb_strtoupper( $im->profesional->TipoEspecialidad->nombre ) }} --}}
                                                {{-- {{ mb_strtoupper( $im->profesional->SubTipoEspecialidad->nombre ) }}     --}}
                                            </td>
                                            <td>Informe Medico</td>
                                            <td>
                                                <button type="button" class="btn btn-secondary-light-c btn-xxs" onclick="ver_pdf_informe_medico({{ $im->id_ficha_atencion }});"><i class="feather icon-file"></i> Ver certificado</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                                @if(isset($uso_personal))
                                    @foreach( $uso_personal as $us )
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($us->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                <strong>{{ $us->profesional->nombre }} {{ $us->profesional->apellido_uno }} {{ $us->profesional->apellido_dos }} </strong>
                                                <br>
                                                @if (isset($us->profesional->SubTipoEspecialidad->nombre))
                                                    <span style="font-size: 9px;">{{ mb_strtoupper( $us->profesional->TipoEspecialidad->nombre ).' '.mb_strtoupper( $us->profesional->SubTipoEspecialidad->nombre ) }}</span>
                                                @else
                                                    {{ mb_strtoupper( $us->profesional->TipoEspecialidad->nombre ) }}
                                                @endif
                                                {{-- {{ mb_strtoupper( $us->profesional->especialidad->nombre ) }} --}}
                                                {{-- {{ mb_strtoupper( $us->profesional->TipoEspecialidad->nombre ) }} --}}
                                                {{-- {{ mb_strtoupper( $us->profesional->SubTipoEspecialidad->nombre ) }}     --}}
                                            </td>
                                            <td>Uso Personal</td>
                                            <td>
                                                <button type="button" class="btn btn-secondary-light-c btn-xxs" onclick="ver_pdf_uso_personal({{ $us->id_ficha_atencion }});"><i class="feather icon-file"></i> Ver certificado</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Cierre: Container Completo-->
<!-- Modalcertificado profesional-->
{{--
<div id="agregar_certificado_profesional_ro" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="agregar_receta_profesional_ro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar certificado</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="recetas_profesional">
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <h6 class="text-c-blue ml-2 mb-3">Ingrese los datos del certificado</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Rut</label>
                                <input type="person" class="form-control" name="rut_paciente" id="rut_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Nombres</label>
                                <input type="text" class="form-control" name="nombres_paciente" id="nombres_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos_paciente"
                                    id="apellidos_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Tipo de certificado</label>
                                <select id="tipo_certificado" name="tipo_certificado" class="form-control">
                                    <option selected value="0">Seleccione una opción </option>
                                    <option>..</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Fecha</label>
                                <input type="date" class="form-control" name="fecha_paciente" id="fecha_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <h6 class="ml-2 mt-2">Adjuntar certificado</h6>
                                <input type="file" class="aform-control-file pb-3"
                                    id="adjuntar_certificado_receta_online">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Comentarios</label>
                                <textarea class="form-control" rows="1" name="comentarios_examen"
                                    id="comentarios_examen"></textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>
--}}
@endsection
@section('page-script')
<script>
    $(document).ready(function () {
        $('#tabla_certificado_paciente_ro').DataTable({
            responsive: true,
        });
    });

    function ver_pdf_certificado_reposo(id_ficha_atencion)
    {
        Fancybox.show(
            [
                {
                src: '{{ route("pdf.certificado_reposo") }}?id_ficha_atencion='+id_ficha_atencion,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }

    function ver_pdf_informe_medico(id_ficha_atencion)
    {
        Fancybox.show(
            [
                {
                src: '{{ route("pdf.informe_medico") }}?id_ficha_atencion='+id_ficha_atencion,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }

    function ver_pdf_uso_personal(id_ficha_atencion)
    {
        Fancybox.show(
            [
                {
                src: '{{ route("pdf.uso_personal") }}?id_ficha_atencion='+id_ficha_atencion,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }

    function ver_pdf_interconsulta(id_interconsulta)
    {
        Fancybox.show(
            [
                {
                src: '{{ route("pdf.interconsulta") }}?id_interconsulta='+id_interconsulta,
                type: "iframe",
                preload: false,
                },
            ]
        );
    }


</script>
@endsection
