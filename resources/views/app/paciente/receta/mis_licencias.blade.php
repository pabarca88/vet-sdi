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
                            <h5 class="m-b-10 font-weight-bold">Mis licencias</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.home') }}"
                                    data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i
                                        class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta') }}"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Volver a inicio de receta online">Receta Online</a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('paciente.receta.licencia') }}">Mis licencias</a></li>
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
                        <div class="row">
                            <div class="col-md-12">
                            <h4 class="text-c-blue f-20 d-inline">Mis licencias</h4>
                            <!--<button type="button" class="btn btn-success btn-sm d-inline float-right mr-4 my-1" data-toggle="modal" data-target="#agregar_licencia_profesional_ro">
                                    <i class="feather icon-plus"></i> Agregar licencia
                                </button>-->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabla_licencia_paciente_ro"
                            class="display table table-striped dt-responsive nowrap table-xs"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Profesional</th>
                                    <th>Estado</th>
                                    <th>Licencia</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($fichas))
                                @foreach ( $fichas as $f )
                                    @foreach ( $f->licencias()->get() as $l)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($l->created_at)->format('d/m/Y') }}</td>
                                        <td>
                                        <strong>{{ $f->Profesional()->first()->nombre }} {{ $f->Profesional()->first()->apellido_uno }} {{ $f->Profesional()->first()->apellido_dos }} </strong>
                                        <br>
                                        {{ $f->Profesional()->first()->especialidad()->first()->txt_esp }}</td>
                                        <td>Enviado a Isapre</td>
                                        <td>
                                            <button type="button" class="btn btn-primary-light-c btn-xxs" onclick="abri_pdf_licencia('{{ $l->id }}');"><i class="feather icon-file"></i> Ver licencia</button>
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
<!--Cierre: Container Completo-->

<script>
    $(document).ready(function () {
        $('#tabla_licencia_paciente_ro').DataTable({
            responsive: true,
        });
    });

    function abri_pdf_licencia(id_licencia)
    {
        Fancybox.show(
            [
                {
                    src: "{{ route('paciente.licencia.pdf') }}?id_licencia="+id_licencia,
                    type: "iframe",
                    preload: false,
                },
            ]
        );
    }
</script>

@endsection
{{-- @section('page-script')

@endsection --}}
