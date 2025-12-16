@extends('template.asistente.template')
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
                                <h5 class="m-b-10 font-weight-bold">Horas no confirmadas</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('asistente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('asistente.buscar_paciente') }}">Buscar Pacientes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
             <!--Horas no confirmadas-->
                <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <div class="row">
                                <div class="col-md-12 align-botton">
                                    <h4 class="text-white f-20 d-inline ml-4 mt-3">Horas no confirmadas</h4>
                                    {{--  <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#agregar_paciente_asistente">
                                        <i class="feather icon-plus"></i> Registrar Paciente
                                    </button>  --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-12">
                                    <table id="tabla_pacientes_asistente" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Paciente</th>
                                            <th class="text-center align-middle">Nacimiento</th>
                                            <th class="text-center align-middle">Contacto</th>
                                            <th class="text-center align-middle">Convenio</th>
                                            <th class="text-center align-middle">Tipo de usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($asistente->Paciente_normal() as $pa )
                                            <tr>
                                                <td class="text-center align-middle">
                                                    {{ $pa->nombre }}
                                                    {{ $pa->apellido_uno }}
                                                    {{ $pa->apellido_dos }}
                                                    <br>
                                                    {{ $pa->rut }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ \Carbon\Carbon::parse($pa->fecha_nac)->format('d-m-Y') }}
                                                </td>
                                                <td class="text-center align-middle">
                                                    {{ $pa->Direccion()->first()->direccion }}
                                                    #{{ $pa->Direccion()->first()->numero_dir }},
                                                    {{ $pa->Direccion()->first()->Ciudad()->first()->nombre }}
                                                    <br>
                                                    {{ $pa->email }}
                                                    <br>
                                                    {{ $pa->telefono_uno }}
                                                    </td>
                                                <td class="text-center align-middle">
                                                {{ $pa->Prevision()->first()->nombre }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="badge badge-primary">
                                                        @if (isset($pa->Premium()->first()->id))
                                                            Premiun
                                                        @else
                                                            Basico
                                                        @endif
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
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


@endsection

@section('page-script')
<script>
    $(document).ready(function(){
        $('#tabla_pacientes_asistente').DataTable({
            responsive: true,
        });
    });
</script>
@endsection
