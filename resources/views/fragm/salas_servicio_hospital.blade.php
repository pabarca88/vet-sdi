<div class="row mb-2">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-info">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="text-white f-20 mt-2 mb-2 float-left">Servicio {{ $servicio->nombre_servicio }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h6 class="t-aten">{{ $servicio->nombre_servicio }}</h6>
                                <p>Jefe del Servicio: {{ $servicio->jefe_servicio->nombre }} {{ $servicio->jefe_servicio->apellido_uno }} {{ $servicio->apellido_dos }}</p>
                                <p>N° de Camas: {{ $servicio->numero_camas }}</p>
                                <p>N° de Camas Disponibles: {{ $servicio->camas_disponibles }}</p>
                                <p>N° de Camas Ocupadas: {{ $servicio->camas_ocupadas }}</p>
                                <p>N° de Salas: {{ $servicio->numero_salas }}</p>
                            </div>
                        </div>
                        <table id="tabla_profesionales_servicios" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                            <thead>
                                <th class="align-center">Médicos</th>
                            </thead>
                            <tbody>
                                @if (count($servicio->profesionales) > 0)
                                    @foreach ($servicio->profesionales as $profesional)
                                        <tr>
                                            <td>{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</td>
                                        </tr>
                                    @endforeach
                                @else

                                @endif
                            </tbody>
                        </table>
                        <table id="tabla_tens_servicios" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                            <thead>
                                <th class="align-center">Tens</th>
                            </thead>
                            <tbody>
                                @if (isset($servicio->tens) && count($servicio->tens) > 0)
                                    @foreach ($servicio->tens as $profesional)
                                        <tr>
                                            <td>{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</td>
                                        </tr>
                                    @endforeach
                                @else

                                @endif
                            </tbody>
                        </table>
                        <table id="tabla_enfermeras_servicios" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                            <thead>
                                <th class="align-center">Enfermeras</th>
                            </thead>
                            <tbody>
                                @if (isset($servicio->tens) && count($servicio->tens) > 0)
                                    @foreach ($servicio->tens as $profesional)
                                        <tr>
                                            <td>{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</td>
                                        </tr>
                                    @endforeach
                                @else

                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-9" >
                        <div class="row">
                            @for ($i = 1; $i <= $servicio->numero_salas; $i++)
                                @php
                                    $id_sala_servicio = $servicio->id.'-'.$i;
                                    // Verificamos si la sala correspondiente ya tiene información en $servicio->salas
                                    $salaInfo = $servicio->salas->where('id_sala_servicio', $id_sala_servicio)->first();
                                @endphp
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">Sala {{ $i }}</div>
                                        <div class="card-body">
                                            @if($salaInfo)
                                                <p>Cantidad de camas: {{ $salaInfo->cantidad_camas }}</p>
                                                <div class="camas-container d-flex flex-wrap">
                                                    @for ($j = 1; $j <= $salaInfo->cantidad_camas; $j++)

                                                        <div class="cama-cubo m-1 ">
                                                            @foreach ($servicio->pacientes as $p)
                                                                @if($p->id_cama == $j && $salaInfo->id == $p->id_sala)

                                                                <a href="javascript:void(0)" onclick="abrir_atencion_paciente({{ $p->id_paciente }},{{ $p->id_paciente_triage }})">
                                                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                                                        <img src="{{ asset('images/paciente.png') }}" alt="image" class="image_paciente">
                                                                        <p>{{ $p->nombres }} {{ $p->apellido_uno_paciente }} {{ $p->apellido_dos_paciente }}</p>
                                                                         <p class="{{ $p->clase_html }} text-center rounded">{{ $p->urgencia }}</p>
                                                                     </div>
                                                                     <div class="d-flex justify-content-between">
                                                                        <p>{{ $p->nombre }} {{ $p->apellido_uno }} {{ $p->apellido_dos }}</p>
                                                                        <button class="btn btn-outline-danger btn-sm" onclick="sacar_paciente_cama({{ $p->id }})"><i class="fas fa-trash"></i></button>
                                                                     </div>
                                                                </a>

                                                                @if(Auth::user()->id == $p->id_profesional)
                                                                    <p>Paciente Propio</p>
                                                                @endif

                                                                @endif
                                                            @endforeach
                                                        </div>

                                                    @endfor

                                                    <div class="col-md-12 text-center">
                                                        <a href="javascript:void(0)" onclick="clave1({{ $salaInfo->id }},'2 - Adulto')"><img src="https://urgencias.med-sdi.cl/images/iconos_urg/em.png" alt="" style="width: 40px;" class="pulsate-fwd"></a>
                                                    </div>
                                                </div>
                                            @else
                                                <p>No hay información disponible para esta sala.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
