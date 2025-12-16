@extends('template.paciente_dependiente.template')
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
                            <h5 class="m-b-10 font-weight-bold">Mis Certificados</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.dependiente.home', ['id_dependiente_activo' => $id_dependiente_activo]) }}"
                                    data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.dependiente.receta', ['id_dependiente_activo' => $id_dependiente_activo]) }}"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Volver a inicio de receta online">Receta Online</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ ROUTE('paciente.dependiente.receta.certificado', ['id_dependiente_activo' => $id_dependiente_activo]) }}">Mis
                                    Certificados</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-c-blue f-20 d-inline ml-4">Mis Certificados</h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6 col-md-12">
                                <table id="tabla_certificado_paciente_ro"
                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-wrap text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Profesional</th>
                                            <th class="text-center align-middle">Tipo de certificado</th>
                                            <th class="text-center align-middle">Estado</th>
                                            <th class="text-center align-middle">Certificado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($fichas))
                                            @foreach( $fichas as $f )
                                                @foreach( $f->licencias()->get() as $l)
                                                    <tr>
                                                        <td class="text-wrap text-center align-middle">{{ \Carbon\Carbon::parse($l->created_at)->format('d/m/Y') }}</td>
                                                        <td class="align-middle text-center">
                                                            <strong>{{ $f->Profesional()->first()->nombre }} {{ $f->Profesional()->first()->apellido_uno }} {{ $f->Profesional()->first()->apellido_dos }} </strong>
                                                            <br>
                                                            {{ $f->Profesional()->first()->especialidad()->first()->txt_esp }}
                                                        </td>
                                                        <td class="text-wrap text-center align-middle">{{ $l->diagnostico_principal }}</td>
                                                        <td class="align-middle text-center">Enviado</td>
                                                        <td class="text-center align-middle">
                                                            <button type="button" class="btn btn-primary btn-sm"
                                                                data-toggle="modal" data-target="#m_cons_ex">
                                                                <i class="feather icon-file-plus"></i> Ver Certificado</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
    </div>
</div>
<!--Cierre: Container Completo-->
<!-- Modalcertificado profesional-->
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
@endsection
@section('page-script')
<script>
    $(document).ready(function () {
        $('#tabla_certificado_paciente_ro').DataTable({
            responsive: true,
        });
    });

</script>
@endsection
