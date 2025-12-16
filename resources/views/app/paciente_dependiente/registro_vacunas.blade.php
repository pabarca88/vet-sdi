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
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip"
                                    data-placement="top" title="Volver a mi escritorio"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.mis_profesionales') }}">Registro de vacunas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Header-->
        <div class="row">
            <div class="col-12">
                <!--Card Nav Pills-->
                <div class="card">
                    <div class="card-header bg-info">
                        <h4 class="f-20 text-white">Registro de vacunas</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabla_recetas_paciente_ro"
                                        class="display table table-striped dt-responsive nowrap table-sm"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="align-middle">Edad</th>
                                                <th class="align-middle">Fecha dosis</th>
                                                <th class="align-middle">Vacuna</th>
                                                <th class="align-middle">Próx.Dosis</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">
                                                   1 mes y 5 días
                                                </td>
                                                <td class="align-middle">
                                                    <span class="badge badge-secondary">00-00-2025</span>
                                                </td>
                                                <td class="align-middle">
                                                    Triplefelina
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-info">11-12-2025</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">
                                                   2 meses y 15 días
                                                </td> 
                                                <td class="align-middle">
                                                    <span class="badge badge-secondary">00-00-2025</span>
                                                </td>
                                                <td class="align-middle">
                                                    Triplefelina
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-info">11-12-2025</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="align-middle">
                                                   4 meses y 19 días
                                                </td>
                                                <td class="align-middle">
                                                    <span class="badge badge-secondary">00-00-2025</span>
                                                </td>
                                                <td class="align-middle">
                                                    Rabia
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-info">11-12-2025</span>
                                                </td>
                                            </tr>
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
@endsection

@section('page-script')
    <script>
        function active_e(tipo_esp){
            if(tipo_esp=='all')
            {
                $('.filtro_le').removeClass('d-none');
            }else{
                $('.filtro_le').addClass('d-none');
                $('.le_'+tipo_esp).removeClass('d-none');
            }
        }
    </script>
@endsection
