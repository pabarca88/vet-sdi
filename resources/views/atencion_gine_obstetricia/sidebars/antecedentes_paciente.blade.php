<div id="antecedentes_paciente" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg"
    data-width="370px" data-offset="true">
    <header class="bs-canvas-header p-3 bg-info overflow-auto">
        <button type="button" class="bs-canvas-close float-left close" aria-label="Close"><span aria-hidden="true"
                class="text-light">&times;</span></button>
        <h5 class="d-inline-block text-light mb-0 float-right mt-1">Antecedentes del paciente</h5>
    </header>
    <div class="bs-canvas-content">
        <div class="accordion" id="accordionExample">
            <div class="card-sidebar mb-0 rounded-0">
                <div class="card-header-sidebar" id="headingOne">
                    <button class="btn btn-light btn-block text-left" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i
                            class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        INFORMACIÓN DEL PACIENTE
                    </button>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body-sidebar">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">Nombres</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $paciente->nombres }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">Apellidos</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">Rut</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $paciente->rut }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">Nacimiento</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $paciente->fecha_nac }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">Edad</label>
                            <div class="col-7 ml-2 text-secondary">
                                <span>{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}</span>
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">Sexo</label>
                            <div class="col-7 ml-2 text-secondary">
                                @if ($paciente->sexo == 'M')
                                    Masculino
                                @else
                                    Femenino
                                @endif
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">Dirección</label>
                            <div class="col-7 ml-2 text-secondary">

                                @if (isset($paciente))
                                    @if ($paciente->Direccion()->first() != null)
                                        {{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}
                                    @else
                                        <span class="error">NO HA REGISTRADO DIRECCIÓN !</span>
                                    @endif
                                @else
                                    <span class="error">NO HA REGISTRADO DIRECCIÓN !</span>
                                @endif


                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">Comuna / Región</label>
                            <div class="col-7 ml-2 text-secondary">
                                @if (isset($paciente))
                                    @if ($paciente->Direccion()->first()->Ciudad()->first() != null)
                                        {{ $paciente->Direccion()->first()->Ciudad()->first()->nombre }}<br>
                                        {{ $paciente->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                    @else
                                        <span class="error">NO HA REGISTRADO CIUDAD !</span>
                                    @endif
                                @else
                                    <span class="error">NO HA REGISTRADO CIUDAD !</span>
                                @endif

                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">Correo Electrónico</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $paciente->email }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">Teléfono</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $paciente->telefono_uno }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse"
                            data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            CONTACTO DE EMERGENCIA
                        </button>
                    </h2>
                </div>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body-sidebar">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Rut</label>
                        <div class="col-7 ml-2 text-secondary">

                            @if ($paciente->ContactosEmergencia()->first() != null)
                                <span class="info">
                                    <strong>{{ $paciente->ContactosEmergencia()->first()->rut }}</strong>
                                </span>
                            @else
                                <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                            @endif


                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Nombre</label>
                        <div class="col-7 ml-2 text-secondary">


                            @if ($paciente->ContactosEmergencia()->first() != null)
                                <span class="info">
                                    <strong>{{ $paciente->ContactosEmergencia()->first()->nombre }}</strong>
                                </span>
                            @else
                                <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                            @endif


                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Apellidos</label>
                        <div class="col-7 ml-2 text-secondary">

                            @if ($paciente->ContactosEmergencia()->first() != null)
                                <span class="info">
                                    <strong>{{ $paciente->ContactosEmergencia()->first()->apellido_uno .' ' .$paciente->ContactosEmergencia()->first()->apellido_dos }}</strong>
                                </span>
                            @else
                                <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                            @endif


                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Dirección</label>
                        <div class="col-7 ml-2 text-secondary">

                            @if ($paciente->ContactosEmergencia()->first() != null)
                                <span class="info">
                                    <strong>
                                        {{ $paciente->ContactosEmergencia()->first()->Direccion()->first()->direccion .
                                            ' ' .
                                            $paciente->ContactosEmergencia()->first()->Direccion()->first()->numero_dir }}
                                    </strong>
                                </span>
                            @else
                                <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                            @endif


                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Comuna / Región</label>
                        <div class="col-7 ml-2 text-secondary">

                            @if ($paciente->ContactosEmergencia()->first() != null)
                                <span class="info">
                                    <strong>{{ $paciente->ContactosEmergencia()->first()->Direccion()->first()->Ciudad()->first()->nombre }}</strong>
                                </span>
                            @else
                                <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                            @endif



                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Correo Electr&oacute;nico</label>
                        <div class="col-7 ml-2 text-secondary">

                            @if ($paciente->ContactosEmergencia()->first() != null)
                                <span class="info">
                                    <strong>{{ $paciente->ContactosEmergencia()->first()->email }}</strong>
                                </span>
                            @else
                                <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                            @endif

                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Tel&eacute;fono</label>
                        <div class="col-7 ml-2 text-secondary">

                            @if ($paciente->ContactosEmergencia()->first() != null)
                                <span class="info">
                                    <strong>{{ $paciente->ContactosEmergencia()->first()->telefono }}</strong>
                                </span>
                            @else
                                <span class="info"><strong>SIN REGISTRO DE CONTACTO</strong></span>
                            @endif



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-sidebar">
            <div class="card-header-sidebar" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i
                            class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        ANTECEDENTES MÉDICOS
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                data-parent="#accordionExample">
                <div class="card-body-sidebar">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Medicamentos Crónicos</label>
                        <div class="col-7 ml-2 text-secondary listas_sidebar">
                            <ul>

                                @if (isset($medicamentos_cronicos))
                                    @foreach ($medicamentos_cronicos as $med_cronico)
                                        <li>{{ $med_cronico->nombre_medicamento_cronico }}</li>
                                    @endforeach
                                @else
                                    <li>SIN REGISTRO</li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Alergias e Intolerancias</label>
                        <div class="col-7 ml-2 text-secondary listas_sidebar">
                            <ul>

                                @if (isset($alergias))
                                    @foreach ($alergias as $alergia)
                                        <li>{{ $alergia->nombre_alergia }}</li>
                                    @endforeach
                                @else
                                    <li>SIN REGISTRO</li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Operaciones</label>
                        <div class="col-7 ml-2 text-secondary listas_sidebar">
                            <ul>

                                @if (isset($antecedentes_quirurgicos))
                                    @foreach ($antecedentes_quirurgicos as $antecedente_quirurgico)
                                        <li>{{ $antecedente_quirurgico->operacion }}</li>
                                    @endforeach
                                @else
                                    <li>SIN REGISTRO</li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Incidentes en Cirugía</label>
                        <div class="col-7 ml-2 text-secondary listas_sidebar">
                            <ul>
                                <li>??</li>
                            </ul>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Grupo Sanguíneo</label>
                        <div class="col-7 ml-2 text-secondary">
                            @if ($paciente->Antecedentes()->first() != null)
                                @if ($paciente->Antecedentes()->first()->GrupoSanguineo()->first() != null)
                                    {{ $paciente->Antecedentes()->first()->GrupoSanguineo()->first()->nombre_gs }}
                                @endif
                            @else
                                Sin registro
                            @endif
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Acepta Transfusión de Sangre</label>
                        <div class="col-7 ml-2 text-secondary">
                            @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->transfusion == 1)
                                SI
                            @else
                                NO
                            @endif
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-info-2 font-weight-bolder">Donante de Órganos</label>
                        <div class="col-7 ml-2 text-secondary">
                            @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos == 1)
                                SI
                            @else
                                NO
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseCuatro" aria-expanded="false"
                            aria-controls="collapseThree"><i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            PATOLOGÍAS CRÓNICAS
                        </button>
                    </h2>
                </div>
                <div id="collapseCuatro" class="collapse" aria-labelledby="headingThree"
                    data-parent="#accordionExample">
                    <div class="card-body-sidebar">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">
                                ¿Es paciente crónico?
                            </label>
                            <div class="col-7 ml-2 text-secondary">
                                @if ($patoligias_cronicas != null && $patoligias_cronicas != '')
                                    SI
                                @else
                                    NO
                                @endif
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-info-2 font-weight-bolder">
                                Patologías Crónicas
                            </label>
                            <div class="col-7 ml-2 text-secondary listas_sidebar">
                                <ul>
                                    @if (isset($patoligias_cronicas))
                                        @foreach ($patoligias_cronicas as $patoligia_cronica)
                                            <li>{{ $patoligia_cronica->nombre_patologia_cronica }}</li>
                                        @endforeach
                                    @else
                                        <li>SIN REGISTRO</li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			{{--  <div class="card-sidebar">
                <div class="card-header-sidebar" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed" type="button"
                            data-toggle="collapse" data-target="#collapseCinco" aria-expanded="false"
                            aria-controls="collapseThree">
                            ATENCIONES MÉDICAS PREVIAS<i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        </button>
                    </h2>
                </div>
                <div id="collapseCinco" class="collapse" aria-labelledby="headingThree"
                    data-parent="#accordionExample">
                    <div class="card-body-sidebar">

                        @if (isset($fichas))
                            @foreach ($fichas as $fic)
                                @if ($fic->Profesional()->first()->id == $profesional->id)
                                    <div class="row mr-2">
                                        <div class="col-sm-12 col-md-12 bg-light tarjeta-consultas shadow-sm rounded">
                                            <p class="pt-3 pl-2 text-secondary">
                                                {{ $fic->created_at }}<br>
                                                {{ $fic->Profesional()->first()->Especialidad()->first()->nombre }}<br>
                                                {{ $fic->Profesional()->first()->nombre .' ' .$fic->Profesional()->first()->apellido_uno .' ' .$fic->Profesional()->first()->apellido_dos }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        @endif

                    </div>
                </div>
            </div>  --}}

        </div>
    </div>
</div>
