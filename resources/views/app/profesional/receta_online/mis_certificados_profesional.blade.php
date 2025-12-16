@extends('template.profesional.template')
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
                                <li class="breadcrumb-item"><a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('profesional.index_receta_online') }}" data-toggle="tooltip" data-placement="top" title="Volver a inicio de receta online">Receta Online</a></li>
                                <li class="breadcrumb-item"><a href="mis_certificados_profesional.php">Mis certificados</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h4 class="text-c-blue f-22">Mis certificados</h4>
                        </div>
                            <div class="card-body">
                                <table id="tabla_certificado_profesional_ro"
                                    class="display table table-striped dt-responsive nowrap table-xs"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">Fecha</th>
                                            <th class="text-center align-middle">Paciente</th>
                                            <th class="text-center align-middle">Tipo de certificado</th>
                                            <th class="text-center align-middle">Certificado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($reposo)
                                            @foreach ($reposo as $rep)
                                                <tr>
                                                    <td class="text-wrap">{{ $rep->created_at }}
                                                    </td>
                                                    <td>
                                                        {{ $rep->Paciente()->first()->nombres }}<br>
                                                        {{ $rep->Paciente()->first()->rut }}
                                                    </td>
                                                    <td>Certificado Reposo</td>
                                                    <!--
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">Enviado</td>
                                                    -->
                                                    <td class="align-middle"> <div onclick="ver_pdf_certificado_reposo('{{ $rep->id_ficha_atencion }}')"><img src="{{ asset('images/documento.png') }}" alt="Documento" height="35px"></div></td>
                                                    <!--
                                                    <td class="align-middle text-center"><a href="#" download="Certificado_NombrePaciente"><img src="{{ asset('images/documento.svg') }}" alt="Documento" height="20px"> Ver</a></td>-->
                                                </tr>
                                            @endforeach
                                        @endif

                                        @if ($interconsulta)
                                            @foreach ($interconsulta as $inter)
                                                <tr>
                                                    <td class="text-wrap">
                                                        {{ $inter->created_at }}
                                                    </td>
                                                    <td class="">
                                                        {{ $inter->Paciente()->first()->nombres }}<br>
                                                        {{ $inter->Paciente()->first()->rut }}
                                                    </td>
                                                    <td>Interconsulta</td>
                                                    <!--<td class="align-middle text-center">
                                                    <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                </td>
                                                <td class="align-middle text-center">Enviado</td>-->
                                                    <td> <div onclick="ver_pdf_interconsulta('{{ $inter->id }}')" class="btn btn-secondary-light-c btn-xxs"><i class="feather icon-activity"></i> Ver Receta</div></td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        @if ($informesMedicos)
                                            @foreach ($informesMedicos as $informe)
                                                <tr>
                                                    <td>
                                                        {{ $informe->created_at }}
                                                    </td>
                                                    <td>
                                                        {{ $informe->Paciente()->first()->nombres }}<br>
                                                        {{ $informe->Paciente()->first()->rut }}
                                                    </td>
                                                    <td>Informe Medico</td>
                                                    <!--<td class="align-middle text-center">
                                                    <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                </td>
                                                <td class="align-middle text-center">Enviado</td>-->
                                                    <td class="align-middle"> <div onclick="ver_pdf_informe_medico('{{ $informe->id_ficha_atencion }}')"><img src="{{ asset('images/documento.png') }}" alt="Documento" height="35px"></div></td>
                                                </tr>
                                            @endforeach
                                        @endif

                                        {{--  @if ($controlObesidad)
                                            @foreach ($controlObesidad as $obesidad)
                                                <tr>
                                                    <td>
                                                        {{ $obesidad->created_at }}
                                                    </td>
                                                    <td>
                                                        {{ $obesidad->Paciente()->first()->nombres }}<br>
                                                        {{ $obesidad->Paciente()->first()->rut }}
                                                    </td>
                                                    <td>Control Obesidad</td>
                                                    <!--<td class="align-middle text-center">
                                                    <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                </td>
                                                <td class="align-middle text-center">Enviado</td>-->
                                                    <td class="align-middle"><a href="#" download="Certificado_NombrePaciente"><img src="{{ asset('images/documento.png') }}" alt="Documento" height="35px"> Ver </a></td>
                                                </tr>
                                            @endforeach
                                        @endif  --}}

                                        {{--  @if ($hipertensiones)
                                            @foreach ($hipertensiones as $hipertension)
                                                <tr>
                                                    <td>
                                                        {{ $hipertension->created_at }}
                                                    </td>
                                                    <td>
                                                        {{ $hipertension->Paciente()->first()->nombres }}<br>
                                                        {{ $hipertension->Paciente()->first()->rut }}
                                                    </td>
                                                    <td>Control Hipertensión</td>
                                                    <!--
                                                    <td class="align-middle text-center">
                                                        <button type="button" class="btn  btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Enviar Certificado a Paciente"><i class="feather icon-navigation"></i></button>
                                                    </td>
                                                    <td class="align-middle text-center">Enviado</td>
                                                    -->
                                                    <td class="align-middle"><a href="#" download="Certificado_NombrePaciente"><img src="{{ asset('images/documento.png') }}" alt="Documento" height="35px"></a></td>
                                                </tr>
                                            @endforeach
                                        @endif  --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Cierre: Container Completo-->
    <!-- Modal certificado profesional-->
    {{-- <div id="agregar_certificado_profesional_ro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_receta_profesional_ro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Agregar certificado</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
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
                                    <textarea class="form-control" rows="1" name="comentarios_examen" id="comentarios_examen"></textarea>
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
    </div>--}}
@endsection
