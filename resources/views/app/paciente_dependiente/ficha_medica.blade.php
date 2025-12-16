@extends('template.paciente.template2')
@section('content')

    <div class="auth-wrapper bg-white">
        <div class="container-fluid">
            <!--Ficha Médica Única-->
            <div class="row">
                <div class="col-md-10 mb-2 mt-4 mx-auto">
                    <h3 class="text-center text-c-blue">
                        Ficha Médica Única
                        [
                        {{ $paciente->nombres }}&nbsp;
                        {{ $paciente->apellido_uno }}&nbsp;
                        {{ $paciente->apellido_dos }}
                        ]
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 mx-auto">
                    <div id="accordion">
                        <!--Antecedentes básicos del paciente-->
                        <div class="card">
                            <div class="card-header" id="headingUno" data-toggle="collapse" data-target="#collapseUno"
                                        aria-expanded="true" aria-controls="collapseUno">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseUno"
                                        aria-expanded="true" aria-controls="collapseUno">
                                        <i class="fa fa-angle-right"></i> ANTECEDENTES BÁSICOS DEL PACIENTE
                                    </button>
                                    </a>
                                </h5>
                            </div>
                            <div id="collapseUno" class="collapse bg-accordion" aria-labelledby="headingUno"
                                data-parent="#accordion">
                                <div class="card-body pt-1 pb-1">
                                    <div class="row">
                                        <div class="col-md-10 mx-auto">
                                            <div class="card-deck mb-3">
                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                    <div class="card-header titulo-card rounded-top">
                                                        <h6 class="card-title titulo-text mt-2 mb-2">Información del
                                                            Paciente</h6>
                                                    </div>
                                                    <div class="card-body pt-2 pb-1">
                                                        <ul class="d-inline">
                                                            <li class="mt-2 mb-2">
                                                                <span>
                                                                    <strong>Nombre: </strong>
                                                                </span>
                                                                &nbsp;&nbsp;
                                                                <span>{{ $paciente->nombres }}</span>
                                                            </li>
                                                            <li class="mt-2 mb-2">
                                                                <span>
                                                                    <strong>Apellidos: </strong>
                                                                </span>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <span>{{ $paciente->apellido_uno }}</span>
                                                                &nbsp;
                                                                <span>{{ $paciente->apellido_dos }}</span>
                                                            </li>
                                                            <li class="mt-2 mb-2">
                                                                <span><strong>Rut: </strong>
                                                                </span>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <span>{{ $paciente->rut }}</span>
                                                            </li>
                                                            <li class="mt-2 mb-2">
                                                                <span>
                                                                    <strong>Edad: </strong>
                                                                </span>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <span>{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}</span>
                                                            </li>
                                                            <li class="mt-2 mb-2">
                                                                <span>
                                                                    <strong>Teléfono: </strong>
                                                                </span>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <span>{{ $paciente->telefono_uno }}</span>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <span>{{ $paciente->telefono_dos }}</span>
                                                            </li>
                                                            <li class="mt-2 mb-2">
                                                                <span>
                                                                    <strong>Dirección: </strong>
                                                                </span>
                                                                &nbsp;&nbsp;&nbsp;
                                                                <span>{{ $paciente->Direccion()->first()->direccion }}</span>
                                                            </li>
                                                            <li class="mt-2 mb-2">
                                                                <span>
                                                                    <strong>Comuna/Región: </strong>
                                                                </span>&nbsp;&nbsp;&nbsp;
                                                                <span>{{ $paciente->Direccion()->first()->Ciudad()->first()->nombre }}</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                    <div class="card-header titulo-card rounded-top">
                                                        <h6 class="card-title text-danger mt-2 mb-2">Contacto de Emergencia
                                                        </h6>
                                                    </div>
                                                    <div class="card-body pt-2 pb-1">
                                                        @if (count($paciente->ContactosEmergencia()->get()) > 1)
                                                            <ul class="d-inline">
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Nombre: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;
                                                                    <span>{{ $paciente->ContactosEmergencia()->first()->nombre }}</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Apellidos: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>{{ $paciente->ContactosEmergencia()->first()->apellido_uno }}</span>
                                                                    &nbsp;
                                                                    <span>{{ $paciente->ContactosEmergencia()->first()->apellido_dos }}</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Rut: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>{{ $paciente->ContactosEmergencia()->first()->rut }}</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Edad: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>{{ \Carbon\Carbon::parse($paciente->ContactosEmergencia()->first()->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Teléfono: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>{{ $paciente->ContactosEmergencia()->first()->telefono }}</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Dirección: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>{{ $paciente->ContactosEmergencia()->first()->Direccion()->first()->direccion }}</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Comuna/Región: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>{{ $paciente->ContactosEmergencia()->first()->Direccion()->first()->Ciudad()->first()->nombre }}</span>
                                                                </li>
                                                            </ul>
                                                        @else
                                                            <ul class="d-inline">
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Nombre: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;
                                                                    <span>N/A</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Apellidos: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>N/A</span>
                                                                    &nbsp;
                                                                    <span>N/A</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Rut: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>N/A</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Edad: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>N/A</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Teléfono: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>N/A</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Dirección: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>N/A</span>
                                                                </li>
                                                                <li class="mt-2 mb-2">
                                                                    <span>
                                                                        <strong>Comuna/Región: </strong>
                                                                    </span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <span>N/A</span>
                                                                </li>
                                                            </ul>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <!--Card deck-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Resumen-->
                        <div class="card">
                            <div class="card-header bg-info" id="headingDos" data-toggle="collapse"
                                        data-target="#collapseDos" aria-expanded="false" aria-controls="collapseDos">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapse show panel-title" data-toggle="collapse"
                                        data-target="#collapseDos" aria-expanded="false" aria-controls="collapseDos">
                                        <i class="fa fa-angle-down"></i> RESUMEN
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseDos" class="collapse show" aria-labelledby="headingDos"
                                data-parent="#accordion">
                                <div class="card-body pt-1 pb-1">
                                    <div class="card-body pt-1 pb-1">
                                        <div class="row">
                                            <div class="col-md-12 pl-1 pr-1">
                                                <div class="card-deck">
                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                        <div class="card-header titulo-card rounded-top">
                                                            <h6 class="card-title titulo-text mt-2 mb-2">Grupo Sanguíneo
                                                            </h6>
                                                        </div>
                                                        <div class="card-body pt-3 pb-1">
                                                            @if (isset($paciente->Antecedentes()->first()->id))
                                                                @if (isset(
            $paciente->Antecedentes()->first()->GrupoSanguineo()->first()->nombre_gs,
        ))
                                                                    <p>{{ $paciente->Antecedentes()->first()->GrupoSanguineo()->first()->nombre_gs }}
                                                                    </p>
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                        <div class="card-header titulo-card rounded-top">
                                                            <h6 class="card-title titulo-text mt-2 mb-2">¿Acepta
                                                                Transfusiones?</h6>
                                                        </div>
                                                        <div class="card-body pt-3 pb-1">
                                                            @if (isset($paciente->Antecedentes()->first()->id))
                                                                @if ($paciente->Antecedentes()->first()->transfusion)
                                                                    <p>Si</p>
                                                                @else
                                                                    <p>No</p>
                                                                @endif
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                        <div class="card-header titulo-card rounded-top">
                                                            <h6 class="card-title titulo-text mt-2 mb-2">Enfermedades
                                                                Crónicas</h6>
                                                        </div>
                                                        <div class="card-body pt-2 pb-1">
                                                            @if (isset($paciente->Antecedentes()->first()->id))
                                                                @if (count(
            $paciente->Antecedentes()->first()->EnfermedadesCronicas()->get(),
        ) > 0)
                                                                    @foreach ($paciente->Antecedentes()->first()->EnfermedadesCronicas()->get()
        as $enf)
                                                                        <li type="disc">{{ $enf->Nombre }}</li>
                                                                    @endforeach
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Card deck-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pl-1 pr-1">
                                                <div class="card-deck mb-3">
                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                        <div class="card-header titulo-card rounded-top">
                                                            <h6 class="card-title titulo-text mt-2 mb-2">Medicamentos de Uso
                                                                Crónico</h6>
                                                        </div>
                                                        <div class="card-body pt-2 pb-1">
                                                            @if (isset($paciente->Antecedentes()->first()->id))
                                                                @if (count(
            $paciente->Antecedentes()->first()->Productos()->get(),
        ) > 0)
                                                                    @foreach ($paciente->Antecedentes()->first()->Productos()->get()
        as $prod_enf)
                                                                        <li type="disc">
                                                                            {{ $prod_enf->nombre_medicamento }}</li>
                                                                    @endforeach
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                        <div class="card-header titulo-card rounded-top">
                                                            <h6 class="card-title titulo-text mt-2 mb-2">Últimas Cirugías
                                                            </h6>
                                                        </div>
                                                        <div class="card-body pt-3 pb-1">
                                                            @if (isset($paciente->Antecedentes()->first()->id))
                                                                @if (count(
            $paciente->Antecedentes()->first()->Ciruguias()->get(),
        ) > 0)
                                                                    @foreach ($paciente->Antecedentes()->first()->Ciruguias()->get()
        as $cir)
                                                                        <li type="disc">
                                                                            {{ \Carbon\Carbon::parse($cir->fecha_cirugia)->format('d-m-Y') }}
                                                                            &nbsp;&nbsp;
                                                                            {{ $cir->nombre }}
                                                                        </li>
                                                                    @endforeach
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="card rounded mt-3 mb-3 border-primary">
                                                        <div class="card-header titulo-card rounded-top">
                                                            <h6 class="card-title titulo-text mt-2 mb-2">Alergias</h6>
                                                        </div>
                                                        <div class="card-body pt-3 pb-1">
                                                            @if (isset($paciente->Antecedentes()->first()->id))
                                                                @if (count(
            $paciente->Antecedentes()->first()->Alergias()->get(),
        ) > 0)
                                                                    @foreach ($paciente->Antecedentes()->first()->Alergias()->get()
        as $ale)
                                                                        <li type="disc">{{ $ale->nombre_alergia }}</li>
                                                                    @endforeach
                                                                @else
                                                                    <p>N/A</p>
                                                                @endif
                                                            @else
                                                                <p>N/A</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Card deck-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Transfusiones y donación de órganos-->
                        <div class="card">
                            <div class="card-header" id="headingTres" data-toggle="collapse"
                                        data-target="#collapseTres" aria-expanded="false" aria-controls="collapseTres">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                        data-target="#collapseTres" aria-expanded="false" aria-controls="collapseTres">
                                        <i class="fa fa-angle-right"></i> TRANSFUSIONES Y DONACIÓN DE ÓRGANOS
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTres" class="collapse" aria-labelledby="headingTres"
                                data-parent="#accordion">
                                <div class="card-body bg-accordion pt-1 pb-1">
                                    <div class="row">
                                        <div class="col-md-12 pl-1 pr-1">
                                            <div class="card-deck mb-3">
                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                    <div class="card-header titulo-card rounded-top">
                                                        <h6 class="card-title titulo-text mt-2 mb-2">Donante Total</h6>
                                                    </div>
                                                    <div class="card-body pt-3 pb-1">
                                                        @if (isset($paciente->Antecedentes()->first()->id))
                                                            @if ($paciente->Antecedentes()->first()->dona_organos == 1)
                                                                <p>Si</p>
                                                            @else
                                                                <p>No</p>
                                                            @endif
                                                        @else
                                                            <p>N/A</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                    <div class="card-header titulo-card rounded-top">
                                                        <h6 class="card-title titulo-text mt-2 mb-2">Donante Parcial</h6>
                                                    </div>
                                                    <div class="card-body pt-3 pb-1">
                                                        @if (isset($paciente->Antecedentes()->first()->id))
                                                            @if ($paciente->Antecedentes()->first()->dona_organos == 2)
                                                                <p>Si</p>
                                                            @else
                                                                <p>No</p>
                                                            @endif
                                                        @else
                                                            <p>N/A</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                    <div class="card-header titulo-card rounded-top">
                                                        <h6 class="card-title titulo-text mt-2 mb-2">Organos a Donar</h6>
                                                    </div>
                                                    <div class="card-body pt-3 pb-1">
                                                        @if (isset($paciente->Antecedentes()->first()->id))
                                                            @if ($paciente->Antecedentes()->first()->dona_organos == 1)
                                                                <li type="disc">Todos</li>
                                                            @else
                                                                @if (count(
            $paciente->Antecedentes()->first()->Organos()->get(),
        ) > 0)
                                                                    @foreach ($paciente->Antecedentes()->first()->Organos()->get()
        as $org)
                                                                        <li type="disc">{{ $org->nombre }}</li>
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                        @else
                                                            <p>N/A</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                    <div class="card-header titulo-card rounded-top">
                                                        <h6 class="card-title titulo-text mt-2 mb-2">Realiza Transfusiones
                                                        </h6>
                                                    </div>
                                                    <div class="card-body pt-3 pb-1">
                                                        @if (isset($paciente->Antecedentes()->first()->id))
                                                            @if ($paciente->Antecedentes()->first()->dona_sangre)
                                                                <p>Si</p>
                                                            @else
                                                                <p>No</p>
                                                            @endif
                                                        @else
                                                            <p>N/A</p>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card rounded mt-3 mb-3 border-primary">
                                                    <div class="card-header titulo-card rounded-top">
                                                        <h6 class="card-title titulo-text mt-2 mb-2">Impedimento Donar</h6>
                                                    </div>
                                                    <div class="card-body pt-3 pb-1">
                                                        @if (isset($paciente->Antecedentes()->first()->id))
                                                            @if (strlen($paciente->Antecedentes()->first()->impedimento_donar) > 0)
                                                                <p>{{ $paciente->Antecedentes()->first()->impedimento_donar }}
                                                                </p>
                                                            @else
                                                                <p>Ninguno</p>
                                                            @endif
                                                        @else
                                                            <p>N/A</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Card deck-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Información Confidencial-->
                        @if (count($paciente->FichaAtencionConfi()->get()) > 0)
                            <div class="card">
                                <div class="card-header bg-primary" id="headingCuatro">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseCuatro" aria-expanded="false"
                                            aria-controls="collapseCuatro">
                                            <i class="fa fa-angle-right"></i> INFORMACIÓN CONFIDENCIAL
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseCuatro" class="collapse" aria-labelledby="headingCuatro"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <h5 class="text-c-blue text-center">
                                                    Información confidencial
                                                </h5>
                                                <hr>
                                            </div>
                                        </div>
                                        <!-- pendiente -->
                                        <div class="dt-responsive table-responsive">
                                            <table id="tabla_informacion_confidencial"
                                                class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Profesional</th>
                                                        <th class="text-center align-middle">Hipótesis diagnóstica</th>
                                                        <th class="text-center align-middle">Tratamiento 1</th>
                                                        <th class="text-center align-middle">Tratamiento 2</th>
                                                        <th class="text-center align-middle">Tratamiento 3</th>
                                                        <th class="text-center align-middle">GES</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($paciente->FichaAtencionConfi()->get() as $confi)
                                                        <tr>
                                                            <td char="align-middle text-center">
                                                                {{ \Carbon\Carbon::parse($confi->created_at)->format('d/m/Y') }}
                                                            </td>
                                                            <td char="align-middle">
                                                                {{ $confi->Profesional()->first()->nombre }}
                                                                &nbsp;
                                                                {{ $confi->Profesional()->first()->apellido_uno }}
                                                                &nbsp;
                                                                {{ $confi->Profesional()->first()->apellido_dos }}
                                                                <br />
                                                                {{ $confi->Profesional()->first()->Especialidad()->first()->nombre }}
                                                            </td>
                                                            <td char="align-middle text-center">
                                                                {{ $confi->hipotesis_diagnostico }}
                                                            </td>
                                                            @if (count($confi->Recetas()->get()) > 0)
                                                                @foreach ($confi->Recetas()->get() as $conf_rece)
                                                                    @if (count($conf_rece->DetallesReceta()->get()) > 0)
                                                                        @for ($i = 0; $i < 3; $i++)
                                                                            @if ($conf_rece->DetallesReceta()->get())
                                                                                <td char="align-middle text-center">
                                                                                    <br>1
                                                                                </td>
                                                                            @else
                                                                                <td char="align-middle text-center">
                                                                                    <br>2
                                                                                </td>
                                                                            @endif
                                                                        @endfor
                                                                    @else
                                                                        <td char="align-middle text-center">
                                                                            <br>
                                                                        </td>
                                                                        <td char="align-middle">
                                                                            <br>
                                                                        </td>
                                                                        <td char="align-middle">
                                                                            <br>
                                                                        </td>
                                                                    @endif
                                                                @endforeach
                                                            @else
                                                                <td char="align-middle text-center">
                                                                    <br>
                                                                </td>
                                                                <td char="align-middle">
                                                                    <br>
                                                                </td>
                                                                <td char="align-middle">
                                                                    <br>
                                                                </td>
                                                            @endif
                                                            <td char="align-middle text-center">
                                                                @if ($confi->ges)
                                                                    SI
                                                                @else
                                                                    NO
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--Control de patologías crónicas-->
                        @if (false)
                            <div class="card">
                                <div class="card-header" id="headingCinco">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseCinco" aria-expanded="false"
                                            aria-controls="collapseCinco">
                                            <i class="fa fa-angle-right"></i> CONTROL DE PATOLOGÍAS CRÓNICAS
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseCinco" class="collapse" aria-labelledby="headingCinco"
                                    data-parent="#accordion">
                                    <div class="accordion" id="accordion_patologias_cronicas">
                                        <!--Tabla hipertensión arterial-->
                                        <div class="card-header bg-cronicos pl-3" id="accordion_patologias_cronicas">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed pl-3" data-toggle="collapse"
                                                    data-target="#collapse_cronicos_hipertension" aria-expanded="false"
                                                    aria-controls="collapse_cronicos_hipertension">
                                                    <i class="fa fa-angle-right"></i> HIPERTENSIÓN ARTERIAL
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse_cronicos_hipertension" class="collapse"
                                            aria-labelledby="heading_cronicos_hipertension"
                                            data-parent="#accordion_patologias_cronicas">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <h5 class="text-c-blue text-center">Hipertensión arterial</h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <table id="tabla_hipertension"
                                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle text-center">Fecha</th>
                                                            <th class="align-middle text-center">Profesional</th>
                                                            <th class="align-middle text-center">P.Sistólica</th>
                                                            <th class="align-middle text-center">P.Diastólica</th>
                                                            <th class="align-middle text-center">Ideal</th>
                                                            <th class="align-middle text-center">Tratamiento 1</th>
                                                            <th class="align-middle text-center">Tratamiento 2</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>01/01/2021</td>
                                                            <td>Jaime Kriman Astorga<br>
                                                                Cardiología
                                                            </td>
                                                            <td>130 mmHg</td>
                                                            <td>81 mmHg</td>
                                                            <td>100/77 mmHg</td>
                                                            <td>Aspirina 1 al día</td>
                                                            <td>Cardevilol 1 al dia</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/01/2021</td>
                                                            <td>Jaime Kriman Astorga<br>
                                                                Cardiología
                                                            </td>
                                                            <td>130 mmHg</td>
                                                            <td>81 mmHg</td>
                                                            <td>100/77 mmHg</td>
                                                            <td>Aspirina 1 al día</td>
                                                            <td>Cardevilol 1 al dia</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/01/2021</td>
                                                            <td>Jaime Kriman Astorga<br>
                                                                Cardiología
                                                            </td>
                                                            <td>130 mmHg</td>
                                                            <td>81 mmHg</td>
                                                            <td>100/77 mmHg</td>
                                                            <td>Aspirina 1 al día</td>
                                                            <td>Cardevilol 1 al dia</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--Tabla obesidad-->
                                        <div class="card-header bg-cronicos pl-3" id="accordion_patologias_cronicas">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapse_cronicos_obesidad" aria-expanded="false"
                                                    aria-controls="collapse_cronicos_obesidad">
                                                    <i class="fa fa-angle-right"></i> OBESIDAD
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse_cronicos_obesidad" class="collapse"
                                            aria-labelledby="heading_cronicos_obesidad"
                                            data-parent="#accordion_patologias_cronicas">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <h5 class="text-c-blue text-center">Obesidad</h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <table id="tabla_obesidad"
                                                    class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle text-center">Fecha</th>
                                                            <th class="align-middle text-center">Profesional</th>
                                                            <th class="align-middle text-center">Peso</th>
                                                            <th class="align-middle text-center">Variación</th>
                                                            <th class="align-middle text-center">Ideal</th>
                                                            <th class="align-middle text-center">Tratamiento 1</th>
                                                            <th class="align-middle text-center">Tratamiento 2</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>01/01/2021</td>
                                                            <td>Jaime Kriman Astorga<br>
                                                                Cardiología
                                                            </td>
                                                            <td>100 Kg</td>
                                                            <td>6 </td>
                                                            <td>70kg</td>
                                                            <td>Aspirina 1 al día</td>
                                                            <td>Cardevilol 1 al dia</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/01/2021</td>
                                                            <td>Jaime Kriman Astorga<br>
                                                                Cardiología
                                                            </td>
                                                            <td>100 Kg</td>
                                                            <td>-5 </td>
                                                            <td>70kg</td>
                                                            <td>Aspirina 1 al día</td>
                                                            <td>Cardevilol 1 al dia</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/01/2021</td>
                                                            <td>Jaime Kriman Astorga<br>
                                                                Cardiología
                                                            </td>
                                                            <td>100 Kg</td>
                                                            <td>-5 </td>
                                                            <td>70kg</td>
                                                            <td>Aspirina 1 al día</td>
                                                            <td>Cardevilol 1 al dia</td>
                                                        </tr>
                                                        <tr>
                                                            <td>01/01/2021</td>
                                                            <td>Jaime Kriman Astorga<br>
                                                                Cardiología
                                                            </td>
                                                            <td>100 Kg</td>
                                                            <td>-5 </td>
                                                            <td>70kg</td>
                                                            <td>Aspirina 1 al día</td>
                                                            <td>Cardevilol 1 al dia</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--Tabla diabetes-->
                                        <div class="card-header bg-cronicos pl-3" id="accordion_patologias_cronicas">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapse_cronicos_diabetes" aria-expanded="false"
                                                    aria-controls="collapse_cronicos_diabetes">
                                                    <i class="fa fa-angle-right"></i> DIABETES
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse_cronicos_diabetes" class="collapse"
                                            aria-labelledby="heading_cronicos_diabetes"
                                            data-parent="#accordion_patologias_cronicas">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <h5 class="text-c-blue text-center">Diabetes</h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <table id="tabla_diabetes"
                                                    class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle text-center">Profesional</th>
                                                            <th class="align-middle text-center">Especialidad</th>
                                                            <th class="align-middle text-center">Fecha</th>
                                                            <th class="align-middle text-center">Hipótesis Diagnóstica</th>
                                                            <th class="align-middle text-center">Tratamiento</th>
                                                            <th class="align-middle text-center">Ges</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Jaime Kriman Astorga</td>
                                                            <td>Otorrinolaringología</td>
                                                            <td>12/05/2021</td>
                                                            <td>Hipótesis Diagnóstica</td>
                                                            <td>Rellenar Campo</td>
                                                            <td>No</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jaime Kriman Astorga</td>
                                                            <td>Otorrinolaringología</td>
                                                            <td>12/05/2021</td>
                                                            <td>Hipótesis Diagnóstica</td>
                                                            <td>Rellenar Campo</td>
                                                            <td>No</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jaime Kriman Astorga</td>
                                                            <td>Otorrinolaringología</td>
                                                            <td>12/05/2021</td>
                                                            <td>Hipótesis Diagnóstica</td>
                                                            <td>Rellenar Campo</td>
                                                            <td>No</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--Antecedentes obstétricos neonatales y control de niño sano-->
                        @if (false)
                            <div class="card">
                                <div class="card-header" id="headingNueve">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseNueve" aria-expanded="false"
                                            aria-controls="collapseNueve">
                                            <i class="fa fa-angle-right"></i> ANTECEDENTES OBSTÉTRICOS NEONATALES Y CONTROL
                                            DE NIÑO SANO
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseNueve" class="collapse" aria-labelledby="headingNueve"
                                    data-parent="#accordion">
                                    <div class="accordion" id="accordion_antecedentes_obstetricos_neonatales">
                                        <!--Tabla control de embarazo-->
                                        <div class="card-header bg-neonatologia pl-3"
                                            id="accordion_antecedentes_obstetricos_neonatales">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapse_control_embarazo" aria-expanded="false"
                                                    aria-controls="collapse_control_embarazo">
                                                    <i class="fa fa-angle-right"></i> CONTROL DE EMBARAZO
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse_control_embarazo" class="collapse"
                                            aria-labelledby="heading_control_embarazo"
                                            data-parent="#accordion_antecedentes_obstetricos_neonatales">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <h5 class="text-c-blue text-center">Control de embarazo</h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <table id="tabla_control_embarazo"
                                                    class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle text-center">Fecha</th>
                                                            <th class="align-middle text-center">Profesional</th>
                                                            <th class="align-middle text-center">Semana de<br>
                                                                gestación
                                                            </th>
                                                            <th class="align-middle text-center">Peso</th>
                                                            <th class="align-middle text-center">IMC</th>
                                                            <th class="align-middle text-center">Altura <br>
                                                                Útero</th>
                                                            <th class="align-middle text-center">FPP</th>
                                                            <th class="align-middle text-center">Tratamiento 1</th>
                                                            <th class="align-middle text-center">Tratamiento 2</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-center">12/05/2021</td>
                                                            <td class="align-middle">Jaime Kriman Astorga
                                                                <br />Obstétra
                                                            </td>
                                                            <td class="align-middle text-center">16</td>
                                                            <td class="align-middle text-center">95</td>
                                                            <td class="align-middle text-center">20</td>
                                                            <td class="align-middle text-center">10 cm</td>
                                                            <td class="align-middle text-center">12/10/2021</td>
                                                            <td class="align-middle">Aspirina 1 al dia</td>
                                                            <td class="align-middle">Vitaminas 1 al dia</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!--Tabla parto-->
                                        <div class="card-header bg-neonatologia pl-3"
                                            id="accordion_antecedentes_obstetricos_neonatales">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapse_parto" aria-expanded="false"
                                                    aria-controls="collapse_parto">
                                                    <i class="fa fa-angle-right"></i> PARTO
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapse_parto" class="collapse" aria-labelledby="heading_parto"
                                            data-parent="#accordion_antecedentes_obstetricos_neonatales">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <h5 class="text-c-blue text-center">
                                                            Parto
                                                        </h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div style="overflow-x:auto;">
                                                    <table id="tabla_parto"
                                                        class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                        style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="align-middle text-center">Fecha</th>
                                                                <th class="align-middle text-center">Obstetra</th>
                                                                <th class="align-middle text-center">Neonatólogo</th>
                                                                <th class="align-middle text-center">Matrón/a</th>
                                                                <th class="align-middle text-center">Semana de gestación
                                                                </th>
                                                                <th class="align-middle text-center">Peso</th>
                                                                <th class="align-middle text-center">Talla</th>
                                                                <th class="align-middle text-center">Perímetro c</th>
                                                                <th class="align-middle text-center">APGAR</th>
                                                                <th class="align-middle text-center">Observaciones</th>
                                                                <th class="align-middle text-center">TTO y PREV</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="align-middle text-center">12/05/2021</td>
                                                                <td class="align-middle">Jaime Kriman Astorga<br />
                                                                    Obstétra</td>
                                                                <td class="align-middle">Francisco Fernandez<br />
                                                                    Neonatólogo</td>
                                                                <td class="align-middle">Maria Oyarzún valle</td>
                                                                <td class="align-middle text-center">40</td>
                                                                <td class="align-middle text-center">3000</td>
                                                                <td class="align-middle text-center">50</td>
                                                                <td class="align-middle text-center">45 cm</td>
                                                                <td class="align-middle text-center">10</td>
                                                                <td class="align-middle">Circular cuello</td>
                                                                <td class="align-middle">Vitaminas</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">12/05/2021</td>
                                                                <td class="align-middle">Jaime Kriman Astorga<br />
                                                                    Obstétra</td>
                                                                <td class="align-middle">Francisco Fernandez<br />
                                                                    Neonatólogo</td>
                                                                <td class="align-middle">Maria Oyarzún valle</td>
                                                                <td class="align-middle text-center">40</td>
                                                                <td class="align-middle text-center">3000</td>
                                                                <td class="align-middle text-center">50</td>
                                                                <td class="align-middle text-center">45 cm</td>
                                                                <td class="align-middle text-center">10</td>
                                                                <td class="align-middle">Circular cuello</td>
                                                                <td class="align-middle">Vitaminas</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Tabla neonatologia-->
                                        <div class="card-header bg-neonatologia pl-3"
                                            id="accordion_antecedentes_obstetricos_neonatales">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapse_neonatologia" aria-expanded="false"
                                                    aria-controls="collapse_neonatologia">
                                                    <i class="fa fa-angle-right"></i> NEONATOLOGÍA
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse_neonatologia" class="collapse"
                                            aria-labelledby="heading_neonatologia"
                                            data-parent="#accordion_antecedentes_obstetricos_neonatales">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <h5 class="text-c-blue text-center">
                                                            Neonatología
                                                        </h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div style="overflow-x:auto;">
                                                    <table id="tabla_neonatologia"
                                                        class="display table table-striped table-hover dt-responsive nowrap table-sm"
                                                        style="width:100%;">
                                                        <thead>
                                                            <tr>
                                                                <th class="align-middle text-center">Fecha</th>
                                                                <th class="align-middle text-center">Profesional</th>
                                                                <th class="align-middle text-center">Semana de <br>
                                                                    gestación</th>
                                                                <th class="align-middle text-center">Peso</th>
                                                                <th class="align-middle text-center">talla</th>
                                                                <th class="align-middle text-center">Perimetro c</th>
                                                                <th class="align-middle text-center">APGAR</th>
                                                                <th class="align-middle text-center">Sufrimiento Fetal</th>
                                                                <th class="align-middle text-center">Maniobras x suf fetal
                                                                </th>
                                                                <th class="align-middle text-center">Observaciones</th>
                                                                <th class="align-middle text-center">TTO y PREV</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="align-middle text-center">12/05/2021</td>
                                                                <td class="align-middle">Francisco Fernandez
                                                                    <br />Neonatólogo
                                                                </td>
                                                                <td class="align-middle text-center">40</td>
                                                                <td class="align-middle text-center">3000</td>
                                                                <td class="align-middle text-center">50</td>
                                                                <td class="align-middle text-center">50 cm</td>
                                                                <td class="align-middle text-center">10</td>
                                                                <td class="align-middle text-center">No</td>
                                                                <td class="align-middle text-center">No</td>
                                                                <td class="align-middle">Asp de meconio</td>
                                                                <td class="align-middle">Ninguna</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Tabla Control niño sano-->
                                        <div class="card-header bg-neonatologia pl-3" id="accordion_patologias_cronicas">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapse_niño_sano" aria-expanded="false"
                                                    aria-controls="collapse_niño_sano">
                                                    <i class="fa fa-angle-right"></i> CONTROL NIÑO SANO
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapse_niño_sano" class="collapse"
                                            aria-labelledby="heading_niño_sano"
                                            data-parent="#accordion_antecedentes_obstetricos_neonatales">
                                            <div class="accordion" id="accordion_niño_sano">
                                                <!--Vacunas-->
                                                <div class="card-header bg-neonatologia pl-5" id="accordion_niño_sano">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed btn-block"
                                                            data-toggle="collapse" data-target="#collapse_vacunas"
                                                            aria-expanded="false" aria-controls="collapse_vacunas">
                                                            <i class="fa fa-angle-right"></i> VACUNAS
                                                    </h5>
                                                </div>
                                                <div id="collapse_vacunas" class="collapse"
                                                    aria-labelledby="heading_vacunas" data-parent="#accordion_niño_sano">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <h5 class="text-c-blue text-center">
                                                                    Vacunas
                                                                </h5>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="tabla_vacunas"
                                                                class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                                style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th char="align-middle text-center">Fecha</th>
                                                                        <th char="align-middle text-center">Profesional
                                                                            <br />vacunatorio
                                                                        </th>
                                                                        <th char="align-middle  text-center">Vacuna</th>
                                                                        <th char="align-middle  text-center">Tolerancia</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td char="align-middle text-center">12/05/2021</td>
                                                                        <td char="align-middle">Gabriela Astorga
                                                                            <br />Las Condes
                                                                        </td>
                                                                        <td char="align-middle text-center">Tetravalente
                                                                        </td>
                                                                        <td char="align-middle text-center">Bueno</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td char="align-middle text-center">12/05/2021</td>
                                                                        <td char="align-middle">Gabriela Astorga
                                                                            <br />Las Condes
                                                                        </td>
                                                                        <td char="align-middle text-center">Tetravalente
                                                                        </td>
                                                                        <td char="align-middle text-center">Bueno</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td char="align-middle text-center">12/05/2021</td>
                                                                        <td char="align-middle">Gabriela Astorga
                                                                            <br />Las Condes
                                                                        </td>
                                                                        <td char="align-middle text-center">Tetravalente
                                                                        </td>
                                                                        <td char="align-middle text-center">Bueno</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Control niño sano-->
                                                <div class="card-header bg-neonatologia pl-5" id="accordion_niño_sano">
                                                    <h5 class="mb-0">
                                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                                            data-target="#collapse_control_niño_sano" aria-expanded="false"
                                                            aria-controls="collapse_control_niño_sano">
                                                            <i class="fa fa-angle-right"></i> CONTROL NIÑO SANO
                                                        </button>
                                                    </h5>
                                                </div>
                                                <div id="collapse_control_niño_sano" class="collapse"
                                                    aria-labelledby="heading_control_niño_sano"
                                                    data-parent="#accordion_niño_sano">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-md-12">
                                                                <h5 class="text-c-blue text-center">
                                                                    Control niño sano
                                                                </h5>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="tabla_control_niño_sano"
                                                                class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                                style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="align-middle  text-center">Fecha</th>
                                                                        <th class="align-middle text-center">Profesional
                                                                        </th>
                                                                        <th class="align-middle text-center">Peso</th>
                                                                        <th class="align-middle text-center">Talla</th>
                                                                        <th class="align-middle text-center">Estado
                                                                            nutricional</th>
                                                                        <th class="align-middle text-center">Vacunas</th>
                                                                        <th class="align-middle text-center">Indicaciones
                                                                        </th>
                                                                        <th class="align-middle text-center">Indicaciones
                                                                        </th>
                                                                        <th class="align-middle text-center">Indicaciones
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="align-middle text-center">12/05/2021
                                                                        </td>
                                                                        <td class="align-middle">Gabriela Astorga
                                                                            <br />Pediatra
                                                                        </td>
                                                                        <td class="align-middle text-center">4500</td>
                                                                        <td class="align-middle text-center">55</td>
                                                                        <td class="align-middle text-center">Bueno</td>
                                                                        <td class="align-middle text-center">n/c</td>
                                                                        <td class="align-middle">Apoyo lactancia</td>
                                                                        <td class="align-middle">Vit c 1 al dia</td>
                                                                        <td class="align-middle">Vit c 1 al dia</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-center">12/05/2021
                                                                        </td>
                                                                        <td class="align-middle">Gabriela Astorga
                                                                            <br />Pediatra
                                                                        </td>
                                                                        <td class="align-middle text-center">4500</td>
                                                                        <td class="align-middle text-center">55</td>
                                                                        <td class="align-middle text-center">Bueno</td>
                                                                        <td class="align-middle text-center">n/c</td>
                                                                        <td class="align-middle">Apoyo lactancia</td>
                                                                        <td class="align-middle">Vit c 1 al dia</td>
                                                                        <td class="align-middle">Vit c 1 al dia</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="align-middle text-center">12/05/2021
                                                                        </td>
                                                                        <td class="align-middle">Gabriela Astorga
                                                                            <br />Pediatra
                                                                        </td>
                                                                        <td class="align-middle text-center">4500</td>
                                                                        <td class="align-middle text-center">55</td>
                                                                        <td class="align-middle text-center">Bueno</td>
                                                                        <td class="align-middle text-center">n/c</td>
                                                                        <td class="align-middle">Apoyo lactancia</td>
                                                                        <td class="align-middle">Vit c 1 al dia</td>
                                                                        <td class="align-middle">Vit c 1 al dia</td>
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
                            </div>
                        @endif
                        <!--Tratamientos médicos-->
                        @if (count($paciente->FichaAtencionNoConfi()->get()) > 0)
                            <div class="card">
                                <div class="card-header" id="headingSeis">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseSeis" aria-expanded="false" aria-controls="collapSeis">
                                            <i class="fa fa-angle-right"></i> TRATAMIENTOS MÉDICOS
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseSeis" class="collapse" aria-labelledby="headingSeis"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <h5 class="text-c-blue text-center">Tratamientos médicos</h5>
                                                <hr>
                                            </div>
                                        </div>
                                        <table id="tabla_tratamientos_medicos"
                                            class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Profesional</th>
                                                    <th>Especialidad</th>
                                                    <th>Fecha</th>
                                                    <th>Hipótesis Diagnóstica</th>
                                                    <th>Tratamiento</th>
                                                    <th>Ges</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($paciente->FichaAtencionNoConfi()->get() as $TrataMed)
                                                    <tr>
                                                        <td>
                                                            {{ $TrataMed->Profesional()->first()->nombre }}
                                                            &nbsp;
                                                            {{ $TrataMed->Profesional()->first()->apellido_uno }}
                                                            &nbsp;
                                                            {{ $TrataMed->Profesional()->first()->apellido_dos }}
                                                        </td>
                                                        <td>
                                                            {{ $TrataMed->Profesional()->first()->Especialidad()->first()->nombre }}
                                                        </td>
                                                        <td>
                                                            {{ \Carbon\Carbon::parse($TrataMed->created_at)->format('d/m/Y') }}
                                                        </td>
                                                        <td>
                                                            {{ $TrataMed->hipotesis_diagnostico }}
                                                        </td>
                                                        <td>Rellenar Campo</td>
                                                        <td>
                                                            @if ($TrataMed->ges)
                                                                SI
                                                            @else
                                                                NO
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--Tratamientos odontológicos-->
                        @if (false)
                            <div class="card">
                                <div class="card-header" id="headingSiete">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseSiete" aria-expanded="false"
                                            aria-controls="collapseSiete">
                                            <i class="fa fa-angle-right"></i> TRATAMIENTOS ODONTOLÓGICOS
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseSiete" class="collapse" aria-labelledby="headingSiete"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <h5 class="text-c-blue text-center">
                                                    Odontograma
                                                </h5>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                INSERTAR ODONTOGRAMA CON JAVA
                                                <img class="img-fluid text-center"
                                                    src="{{ asset('images/odontograma.png') }}">
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12">
                                                        <h5 class="text-c-blue text-center">Tratamientos odontológicos</h5>
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="dt-responsive table-responsive">
                                                    <table id="tabla_odontologico_tratamiento"
                                                        class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                                        style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="align-middle text-center">Fecha</th>
                                                                <th class="align-middle text-center">Profesional</th>
                                                                <th class="align-middle text-center">Peso</th>
                                                                <th class="align-middle text-center">Talla</th>
                                                                <th class="align-middle text-center">Talla</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="align-middle text-center">12/05/2021</td>
                                                                <td class="align-middle text-center">Gabriela Astorga
                                                                    <br />Pediatra
                                                                </td>
                                                                <td class="align-middle text-center">4500</td>
                                                                <td class="align-middle text-center">55</td>
                                                                <td class="align-middle text-center">Bueno</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">12/05/2021</td>
                                                                <td class="align-middle text-center">Gabriela Astorga
                                                                    <br />Pediatra
                                                                </td>
                                                                <td class="align-middle text-center">4500</td>
                                                                <td class="align-middle text-center">55</td>
                                                                <td class="align-middle text-center">Bueno</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="align-middle text-center">12/05/2021</td>
                                                                <td class="align-middle text-center">Gabriela Astorga
                                                                    <br />Pediatra
                                                                </td>
                                                                <td class="align-middle text-center">4500</td>
                                                                <td class="align-middle text-center">55</td>
                                                                <td class="align-middle text-center">Bueno</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--Tratamientos odontológicos por pieza-->
                        @if (false)
                            <div class="card">
                                <div class="card-header" id="headingDiez">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseDiez" aria-expanded="false" aria-controls="collapseDiez">
                                            <i class="fa fa-angle-right"></i> TRATAMIENTOS ODONTOLÓGICOS POR PIEZA
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseDiez" class="collapse" aria-labelledby="headingDiez"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <h5 class="text-c-blue text-center">Tratamientos odontológicos por pieza
                                                </h5>
                                                <hr>
                                            </div>
                                        </div>
                                        <table id="tabla_odontologicos_pieza"
                                            class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle">Pieza N°</th>
                                                    <th class="text-center align-middle">Fecha</th>
                                                    <th class="text-center align-middle">Profesional</th>
                                                    <th class="text-center align-middle">Tratamiento</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">1.1</td>
                                                    <td class="align-middle text-center">12/05/2021</td>
                                                    <td class="align-middle text-center">Javier Kriman N<br />Implantología
                                                    </td>
                                                    <td class="align-middle text-center">Implante integrado</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">1.1</td>
                                                    <td class="align-middle text-center">12/05/2021</td>
                                                    <td class="align-middle text-center">Javier Kriman N<br />Implantología
                                                    </td>
                                                    <td class="align-middle text-center">Implante integrado</td>
                                                </tr>
                                                <tr>
                                                    <td class="align-middle text-center">1.1</td>
                                                    <td class="align-middle text-center">12/05/2021</td>
                                                    <td class="align-middle text-center">Javier Kriman N<br />Implantología
                                                    </td>
                                                    <td class="align-middle text-center">Implante integrado</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!--Tratamientos y antecendetes previos-->
                        @if (false)
                            <div class="card">
                                <div class="card-header" id="headingOcho">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseOcho" aria-expanded="false" aria-controls="collapseOcho">
                                            <i class="fa fa-angle-right"></i> TRATAMIENTOS Y ANTECEDENTES PREVIOS
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapseOcho" class="collapse" aria-labelledby="headingOcho"
                                    data-parent="#accordion">
                                    <div class="card-body bg-accordion">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12">
                                                <h5 class="text-c-blue text-center">Tratamientos y antecedentes previos
                                                </h5>
                                                <hr>
                                            </div>
                                        </div>
                                        <table id="tabla_tratamientos_antecedentes"
                                            class="display table table-striped table-hover dt-responsive nowrap table-xs"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle text-center">Fecha Recopilación</th>
                                                    <th class="align-middle text-center">Profesional</th>
                                                    <th class="align-middle text-center">RUT</th>
                                                    <th class="align-middle text-center">Diagnóstico</th>
                                                    <th class="align-middle text-center">Evolución</th>
                                                    <th class="align-middle text-center">Recopilado en:</th>
                                                    <th class="align-middle text-center">Relevancia</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="align-middle text-center">12/05/2021</td>
                                                    <td class="align-middle">Jaime Kriman Astorga<br />Dermatología</td>
                                                    <td class="align-middle text-center">00.000.000-1</td>
                                                    <td class="align-middle text-center">Apendicectomia</td>
                                                    <td class="align-middle text-center">Buena</td>
                                                    <td class="align-middle">Hospital Van Buren</td>
                                                    <td class="align-middle text-center">Media</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                    <!--Accordion-->
                </div>
            </div>
            <!--Cierre: Ficha Médica Única-->
            <!--Imprimir-->
            <div class="row mb-4 mt-2">
                <div class="col-md-11 mx-auto" align="right">
                    <button type="button" class="btn btn-success btn-sm"><i class="feather icon-printer">
                        </i>Imprimir Ficha</button>
                </div>
            </div>
            <!--Cierre: Imprimir-->
        </div>
    </div>

@endsection

@section('page-styles')

@endsection

@section('page-script')
    <!-- Tablas ficha médica única-->
    <script src="{{ asset('/js/tablas_patologias_cronicas_fmu.js') }}"></script>
    <script src="{{ asset('/js/tablas_tratamientos_antecedentes_fmu.js') }}"></script>
    <script src="{{ asset('/js/tablas_odontologia_fmu.js') }}"></script>
    <script src="{{ asset('/js/tablas_obstetricos_control_fmu.js') }}"></script>
    <script src="{{ asset('/js/tablas_informacion_confidencial_fmu.js') }}"></script>
@endsection
