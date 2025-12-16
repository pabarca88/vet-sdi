@extends('template.adm_cm.template')

@section('page-styles')
<style>
p {
    color: #59636d;
    word-wrap: break-word !important;
    font-size: 14px;
}
.ui-autocomplete {
        z-index: 9999999 !important;
        position: absolute;
        background: #fff;
        border: 1px solid #545454;
        padding: 6px;
        text-transform: uppercase;
        cursor: pointer;
    }
</style>
@endsection

@section('content')

<div class="pcoded-main-container">
	<div class="pcoded-content  m-top">
		<!--Header-->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12 mt-2">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('laboratorio.adm_general.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Prestaciones Laboratorio</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-12 col-md-12">
                <div class="card">
                    <div class="card-header bg-info">
                        <h5 class="text-white d-inline">Prestaciones <span id="valor_uco_header"></span>

                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="display table w-100 table-striped dt-responsive nowrap dataTable no-footer dtr-inline collapsed" id="tabla_prestaciones_dentales" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Categoria</th>
                                    <th>Prestacion</th>

                                    <th>Valor</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($prestaciones))
                                @foreach ($prestaciones as $mi_trabajo)
                                    <tr>
                                        <td>{{ $mi_trabajo->categoria }}</td>
                                        <td>{{ $mi_trabajo->nombre }}</td>
                                        <td>${{ number_format($mi_trabajo->valor,0,',','.') }}</td>

                                        <td>
                                            <button class="btn btn-danger btn-icon" type="button" onclick="eliminar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-x"></i></button>
                                            <button class="btn btn-warning btn-icon" type="button" onclick="mostrar_procedimiento({{ $mi_trabajo->id }})"><i class="feather icon-edit"></i></button>
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

@endsection

@section('page-script')
<script>
    $(document).ready(function() {
        $('#tabla_prestaciones_dentales').DataTable({
            "language": {
                "url": "{{ asset('js/Spanish.json') }}"
            },
            "order": [[0, "asc"]],
            "columnDefs": [{
                "targets": [3],
                "orderable": false
            }]
        });
    });
</script>
@endsection
