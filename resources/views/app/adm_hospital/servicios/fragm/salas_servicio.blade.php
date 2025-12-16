<div class="row">
    @for ($i = 1; $i <= $servicio->numero_salas; $i++)
        @php
            $id_sala_servicio = $servicio->id.'-'.$i;
            // Verificamos si la sala correspondiente ya tiene información en $servicio->salas
            $salaInfo = $servicio->salas->where('id_sala_servicio', $id_sala_servicio)->first();
        @endphp
        <div class="col-md-4" >
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between bg-info text-white font-weight-bold">Sala {{ $i }}</div>
                <div class="card-body {{ $salaInfo && $salaInfo->alerta == 1 ? 'boxEnAlerta white-background' : '' }}">
                    @if($salaInfo)
                        <p>Cantidad de camas: {{ $salaInfo->cantidad_camas }}</p>
                        <div class="camas-container d-flex flex-wrap">
                            @for ($j = 1; $j <= $salaInfo->cantidad_camas; $j++)

                                <div class="cama-cubo m-1 ">
                                    @foreach ($servicio->pacientes as $p)
                                        @if($p->id_cama == $j && $salaInfo->id == $p->id_sala)
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <img src="{{ asset('images/paciente.png') }}" alt="image" class="image_paciente">
                                                <a href="javascript:void(0)" onclick="abrir_atencion_paciente({{ $p->id_paciente }},{{ $p->id_paciente_triage }})">
                                                    <p>{{ $p->nombres }} {{ $p->apellido_uno_paciente }} {{ $p->apellido_dos_paciente }}</p>
                                                    <p class="{{ $p->clase_html }} text-center rounded">{{ $p->urgencia }}</p>
                                                </a>
                                             </div>

                                             <div class="d-flex justify-content-between">
                                                <p>{{ $p->nombre }} {{ $p->apellido_uno }} {{ $p->apellido_dos }}</p>
                                                <button class="btn btn-outline-danger btn-sm" onclick="sacar_paciente_cama({{ $p->id }})"><i class="feather icon-x"></i></button>
                                             </div>


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
