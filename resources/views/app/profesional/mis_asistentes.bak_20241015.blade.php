@extends('template.profesional.template')
@section('content')
    <!--****Container Completo****-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10 font-weight-bold">Mis asistentes</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top"
                                        title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.configuracion') }}" data-toggle="tooltip"
                                        data-placement="top" title="Volver a panel de configuración">
                                        Panel de
                                        Configuración
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Mis asistentes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header bg-info">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 pt-1">
                                    <h4 class="text-white f-20">Mis asistentes</h4>
                                </div>
                                {{-- <div class="col-sm-12 col-md-3">
                                    <button type="button" class="btn btn-block btn-xxs btn-light my-1" data-toggle="modal" data-target="#nuevo_asistente" aria-hidden="true"><i class="feather icon-plus"></i> Registrar asistente</button>
                                </div> --}}
                                <div class="col-sm-12 col-md-3">
                                    <a class="btn btn-block btn-xxs btn-light my-1" href="busq_secretaria.php" role="button"><i class="feather icon-user"></i> Contratar asistente</a>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <div class="table-responsive">
                                    <table id="res-config" class="display table table-sm dt-responsive nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Lugar Atencion</th>
                                                <th>Rut</th>
                                                <th>Nombre</th>
                                                <th>Contacto</th>
                                                <th>Contacto Emergencia</th>
                                                <th>Dirección</th>
                                                <th>Desasociar</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            {{--  @if (isset($asistentes))
                                                @foreach ($asistentes as $a)
                                                    <tr>
                                                        <input type="hidden" name="id_asistente" id="id_asistente" value="{{ $a->id }}">
                                                        <td>-</td>
                                                        <td>{{ $a->rut }}</td>
                                                        <td>
                                                            {{ $a->nombres . ' ' . $a->apellido_uno . ' ' . $a->apellido_dos }}
                                                        </td>
                                                        <td>
                                                            <span>{{ $a->email }}</span><br>
                                                            <span>{{ $a->telefono_uno }}</span>
                                                        </td>
                                                        <td>
                                                            <span></span><br>
                                                            <span></span><br>
                                                            <span></span>
                                                        </td>
                                                        <td>
                                                            @if(issset($a->id_direccion))
                                                                {{ $a->Direccion()->first()->direccion }}<br>
                                                                {{ $a->Direccion()->first()->Ciudad()->first()->nombre }}
                                                            @else
                                                                NO DISPONIBLE
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <button onclick="desasociar_asistente({{ $a->id }});"
                                                                type="button" class="btn btn-danger btn-sm btn-icon"
                                                                data-toggle="tooltip" data-placement="top" title="Desasociar">
                                                                <i class="feather icon-x"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif  --}}

                                            @if (isset($asistentes_lugar_atencion))
                                                @foreach ($asistentes_lugar_atencion as $asis_la)

                                                    <tr>
                                                        <input type="hidden" name="id_asistente" id="id_asistente"
                                                            value="{{ $asis_la->id }}">
                                                        <td>{{ $asis_la->LugarAtencion()->first()->nombre }}</td>
                                                        <td>
                                                            {{ $asis_la->Asistentes()->first()->rut }}</td>
                                                        <td>
                                                            {{ $asis_la->Asistentes()->first()->nombres .' ' .$asis_la->Asistentes()->first()->apellido_uno .' ' .$asis_la->Asistentes()->first()->apellido_dos }}
                                                        </td>
                                                        <td>
                                                            <span>{{ $asis_la->Asistentes()->first()->email }}</span><br>
                                                            <span>{{ $asis_la->Asistentes()->first()->telefono_uno }}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span></span><br>
                                                            <span></span><br>
                                                            <span></span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            @if(isset($asis_la->Asistentes()->first()->id_direccion))
                                                                {{ $asis_la->Asistentes()->first()->Direccion()->first()->direccion }}<br>
                                                                {{ $asis_la->Asistentes()->first()->Direccion()->first()->Ciudad()->first()->nombre }}
                                                            @else
                                                                NO DISPONIBLE
                                                            @endif

                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <button type="button"
                                                                onclick="desasociar_asistente({{ $asis_la->Asistentes()->first()->id }})"
                                                                class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip"
                                                                data-placement="top" title="Desasociar"><i
                                                                    class="feather icon-x"></i></button>
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
            </div>
        </div>
    </div>
@endsection
@include('app.profesional.modales.nuevo_asistente')
