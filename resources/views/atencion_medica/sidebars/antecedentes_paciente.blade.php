<div id="antecedentes_paciente" class="bs-canvas bs-canvas-anim bs-canvas-right position-fixed bg-light h-100 shadow-lg"
    data-width="420px" data-offset="true">
    <header class="bs-canvas-header p-3 bg-info overflow-auto d-flex justify-content-between">
        <button type="button" class="bs-canvas-close close" aria-label="Close"><span aria-hidden="true"
                class="text-light">&times;</span></button>
        <h5 class="d-inline text-light mb-0  mt-1">Antecedentes del paciente </h5>

    </header>
    <div class="bs-canvas-content">
        <div class="accordion" id="accordionExample">
            <div class="card-sidebar mb-0 rounded-0">
                <div class="card-header-sidebar" id="headingOne">
                    <button class="btn btn-light btn-block text-left text-info" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i
                            class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        @if (isset($mascota) && $mascota)
                            INFORMACIÓN DE LA MASCOTA
                        @else
                            INFORMACIÓN DEL PACIENTE
                        @endif
                    </button>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                    data-parent="#accordionExample">
                    <div class="card-body-sidebar">
                        @if (isset($mascota) && $mascota)
                        <div id="info_mascota">
                            <div class="form-row pt-3">
                                <label class="col-3 text-dark font-weight-bolder">Nombre</label>
                                <div class="col-8 ml-2 text-secondary" id="mascota_nombre_text">
                                    {{ $mascota->nombre ?? 'Sin registro' }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Especie</label>
                                <div class="col-8 ml-2 text-secondary" id="mascota_especie_text">
                                    {{ optional($mascota->especieMascota)->nombre ?? $mascota->otra_especie ?? $mascota->especie ?? 'Sin registro' }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Sexo</label>
                                <div class="col-8 ml-2 text-secondary" id="mascota_sexo_text">
                                    @if ($mascota->sexo == 'M')
                                        Macho
                                    @elseif ($mascota->sexo == 'F')
                                        Hembra
                                    @else
                                        {{ $mascota->sexo ?? 'Sin registro' }}
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">FN</label>
                                <div class="col-8 ml-2 text-secondary" id="mascota_fn_text">
                                    {{ $mascota->fecha_nacimiento ?? 'Sin registro' }}
                                    @if (isset($mascota_edad))
                                        - (<span>{{ $mascota_edad }}</span> años)
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Tamaño</label>
                                <div class="col-8 ml-2 text-secondary" id="mascota_tamano_text">
                                    {{ optional($mascota->tamanoMascota)->nombre ?? $mascota->tamano ?? 'Sin registro' }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Chip</label>
                                <div class="col-8 ml-2 text-secondary" id="mascota_chip_text">
                                    @if ($mascota->tiene_chip)
                                        {{ $mascota->chip ?? 'Si' }}
                                    @else
                                        No
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Esterilizado</label>
                                <div class="col-8 ml-2 text-secondary" id="mascota_esterilizado_text">
                                    {{ $mascota->esterilizado ? 'Si' : 'No' }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Enf. cronica</label>
                                <div class="col-8 ml-2 text-secondary" id="mascota_enf_cronica_text">
                                    {{ $mascota->enfermedad_cronica ?? 'Sin registro' }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-3 mb-5">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button type="button" class="btn btn-primary-light-c btn-xxs"
                                        onclick="editarInformacionMascota()"><i class="feather icon-edit"></i> Editar
                                        información</button>
                                </div>
                            </div>
                        </div>
                        <div id="info_mascota-edit" style="display: none">
                            <div class="form-row pt-3">
                                <label class="col-3 text-dark font-weight-bolder">Nombre</label>
                                <div class="col-8 ml-2 text-secondary">
                                    <input type="text" id="mascota_nombre_edit" class="form-control"
                                        value="{{ $mascota->nombre ?? '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Especie</label>
                                <div class="col-8 ml-2 text-secondary">
                                    <select id="mascota_especie_edit" class="form-control">
                                        <option value="0">Seleccione especie</option>
                                        @foreach ($especies_mascotas as $especie)
                                            <option value="{{ $especie->id }}"
                                                @if ($mascota->especie_id == $especie->id || $mascota->especie == $especie->id) selected @endif>{{ $especie->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Otra especie</label>
                                <div class="col-8 ml-2 text-secondary">
                                    <input type="text" id="mascota_otra_especie_edit" class="form-control"
                                        value="{{ $mascota->otra_especie ?? '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Sexo</label>
                                <div class="col-8 ml-2 text-secondary">
                                    <select id="mascota_sexo_edit" class="form-control">
                                        <option value="M" @if ($mascota->sexo == 'M') selected @endif>Macho</option>
                                        <option value="F" @if ($mascota->sexo == 'F') selected @endif>Hembra</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">FN</label>
                                <div class="col-8 ml-2 text-secondary">
                                    <input type="date" id="mascota_fn_edit" class="form-control"
                                        value="{{ $mascota->fecha_nacimiento ?? '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Tamaño</label>
                                <div class="col-8 ml-2 text-secondary">
                                    <select id="mascota_tamano_edit" class="form-control">
                                        <option value="0">Seleccione tamaño</option>
                                        @foreach ($tamanos_mascotas as $tamano)
                                            <option value="{{ $tamano->id }}"
                                                @if ($mascota->tamano_id == $tamano->id || $mascota->tamano == $tamano->slug) selected @endif>{{ $tamano->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Tiene chip</label>
                                <div class="col-8 ml-2 text-secondary">
                                    <select id="mascota_tiene_chip_edit" class="form-control">
                                        <option value="1" @if ($mascota->tiene_chip) selected @endif>Si</option>
                                        <option value="0" @if (!$mascota->tiene_chip) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Chip</label>
                                <div class="col-8 ml-2 text-secondary">
                                    <input type="text" id="mascota_chip_edit" class="form-control"
                                        value="{{ $mascota->chip ?? '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Esterilizado</label>
                                <div class="col-8 ml-2 text-secondary">
                                    <select id="mascota_esterilizado_edit" class="form-control">
                                        <option value="1" @if ($mascota->esterilizado) selected @endif>Si</option>
                                        <option value="0" @if (!$mascota->esterilizado) selected @endif>No</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">F. esterilización</label>
                                <div class="col-8 ml-2 text-secondary">
                                    <input type="date" id="mascota_fecha_esterilizacion_edit" class="form-control"
                                        value="{{ $mascota->fecha_esterilizacion ?? '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-3 text-dark font-weight-bolder">Enf. cronica</label>
                                <div class="col-8 ml-2 text-secondary">
                                    <input type="text" id="mascota_enfermedad_cronica_edit" class="form-control"
                                        value="{{ $mascota->enfermedad_cronica ?? '' }}">
                                </div>
                            </div>
                            <div class="form-row mt-3 mb-5">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button type="button" class="btn btn-primary-light-c btn-xxs"
                                        onclick="guardarInformacionMascota({{ $mascota->id }})"><i class="feather icon-save"></i>
                                        Guardar información</button>
                                    <button type="button" class="btn btn-danger-light-c btn-xxs"
                                        onclick="cancelarInformacionMascota()"><i class="fas fa-trash"></i>Cancelar
                                        edición</button>
                                </div>
                            </div>
                        </div>
                        @else
                        <div id="info_paciente">
                            <div class="form-row pt-3">
                                <label class="col-2 text-dark font-weight-bolder">Rut</label>
                                <div class="col-9 ml-2 text-secondary">
                                    {{ $paciente->rut }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2  text-dark font-weight-bolder">Nombre</label>
                                <div class="col-9 ml-2 text-secondary" id="nombre_completo_paciente">
                                    {{ $paciente->nombres }}
                                    {{ $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">FN</label>
                                <div class="col-9 ml-2 text-secondary" id="fecha_nac_paciente">
                                    {{ $paciente->fecha_nac }} -
                                    (<span>{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}</span>
                                    años)
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Sexo</label>
                                <div class="col-9 ml-2 text-secondary" id="sexo_paciente">
                                    @if ($paciente->sexo == 'M')
                                        Masculino
                                    @else
                                        Femenino
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2  text-c-blue font-weight-bolder">Convenios</label>
                                <div class="col-9 ml-2 text-secondary">
                                    {{ $paciente->Prevision()->first()->nombre }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Dirección</label>
                                <div class="col-9 ml-2 text-secondary" id="direccion_paciente_">

                                    @if (isset($paciente))
                                        @if ($paciente->Direccion()->first() != null)
                                            {{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}
                                        @else
                                            <span class="error">NO ha registrado dirección</span>
                                        @endif
                                    @else
                                        <span class="error">No ha registrado dirección</span>
                                    @endif


                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1 text-dark ">
                                <label class="col-2 text-dark font-weight-bolder">Comuna / Región</label>
                                <div class="col-9 ml-2 text-secondary" id="comuna_region_paciente">
                                    @if (isset($paciente))
										@if ( $paciente->id_direccion )
											@if ($paciente->Direccion()->first()->Ciudad()->first() != null)
												{{ $paciente->Direccion()->first()->Ciudad()->first()->nombre }}<br>
												{{ $paciente->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
											@else
												<span class="error">No se ha registrado ciudad</span>
											@endif
										@else
											<span class="error">NO se ha registrado ciudad</span>
										@endif
                                    @else
                                        <span class="error">NO se ha registrado ciudad</span>
                                    @endif

                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Email</label>
                                <div class="col-9 ml-2 text-secondary" id="email_paciente_">
                                    {{ $paciente->email }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Teléfono</label>
                                <div class="col-9 ml-2 text-secondary" id="telefono_paciente">
                                    {{ $paciente->telefono_uno }}
                                </div>
                            </div>
                            <div class="form-row mt-3 mb-5">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button type="button" class="btn btn-primary-light-c btn-xxs"
                                        onclick="editarInformacionPaciente()"><i class="feather icon-edit"></i> Editar
                                        información</button>
                                </div>
                            </div>
                        </div>
                        <div id="info_paciente-edit" style="display: none">
                            <div class="form-row pt-3">
                                <label class="col-2 text-dark font-weight-bolder">Rut</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="paciente_rut_edit" class="form-control"
                                        value="{{ $paciente->rut }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2  text-dark font-weight-bolder">Nombre</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="paciente_nombre_edit" class="form-control"
                                        value="{{ $paciente->nombres }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Apellido Paterno</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="paciente_apellido_uno_edit" class="form-control"
                                        value="{{ $paciente->apellido_uno }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Apellido Materno</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="paciente_apellido_dos_edit" class="form-control"
                                        value="{{ $paciente->apellido_dos }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">FN</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="date" name="paciente_fn_edit" id="paciente_fn_edit"
                                        class="form-control" value="{{ $paciente->fecha_nac }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Sexo</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <select name="paciente_sexo_edit" id="paciente_sexo_edit" class="form-control">
                                        <option value="M" @if ($paciente->sexo == 'M') selected @endif>
                                            Masculino</option>
                                        <option value="F" @if ($paciente->sexo == 'F') selected @endif>
                                            Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2  text-c-blue font-weight-bolder">Convenios</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" class="form-control" id="paciente_convenio_edit"
                                        value="{{ $paciente->Prevision()->first()->nombre }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Dirección</label>
                                <div class="col-9 ml-2 text-secondary" id="direccion_contacto_text">
                                    <input type="text" class="form-control" id="paciente_dir_edit"
                                        value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1 text-dark ">
                                <label class="col-2 text-dark font-weight-bolder">Región</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <select name="paciente_region_edit" id="paciente_region_edit"
                                        class="form-control" onchange="buscar_ciudad_paciente();">
                                        <option value="0">Seleccione región</option>
                                        @foreach ($regiones as $region)
                                            <option value="{{ $region->id }}"
                                                @if ($paciente->Direccion()->first()->Ciudad()->first()->Region()->first()->id == $region->id) selected @endif>{{ $region->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Comuna</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <select name="paciente_comuna_edit" id="paciente_comuna_edit"
                                        class="form-control">
                                        <option value="0">Seleccione comuna</option>
                                        @foreach ($ciudades as $comuna)
                                            <option value="{{ $comuna->id }}"
                                                @if ($paciente->Direccion()->first()->Ciudad()->first()->id == $comuna->id) selected @endif>{{ $comuna->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Email</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="paciente_email_edit" name="paciente_edit_email"
                                        class="form-control" value="{{ $paciente->email }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Teléfono</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" class="form-control" id="paciente_telefono_edit"
                                        name="paciente_telefono_edit" value="{{ $paciente->telefono_uno }}">
                                </div>
                            </div>
                            <div class="form-row mt-3 mb-5">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button type="button" class="btn btn-primary-light-c btn-xxs"
                                        onclick="guardarInformacionPaciente()"><i class="feather icon-save"></i>
                                        Guardar información</button>
                                    <button type="button" class="btn btn-danger-light-c btn-xxs"
                                        onclick="cancelarInformacionPaciente()"><i class="fas fa-trash"></i>Cancelar
                                        edición</button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @if (isset($mascota) && $mascota)
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="headingResponsable">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed text-info" type="button"
                            data-toggle="collapse" data-target="#collapseResponsable" aria-expanded="false"
                            aria-controls="collapseResponsable"><i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            INFORMACIÓN DEL RESPONSABLE
                        </button>
                    </h2>
                </div>
                <div id="collapseResponsable" class="collapse" aria-labelledby="headingResponsable"
                    data-parent="#accordionExample">
                    <div class="card-body-sidebar">
                        <div id="info_responsable">
                            <div class="form-row pt-3">
                                <label class="col-2 text-dark font-weight-bolder">Rut</label>
                                <div class="col-9 ml-2 text-secondary" id="rut_responsable">
                                    {{ optional($responsable_mascota)->rut ?? 'Sin registro' }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Nombre</label>
                                <div class="col-9 ml-2 text-secondary" id="nombre_responsable">
                                    @if (isset($responsable_mascota))
                                        {{ $responsable_mascota->nombres }}
                                    @else
                                        Sin registro
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Apellidos</label>
                                <div class="col-9 ml-2 text-secondary" id="apellidos_responsable">
                                    @if (isset($responsable_mascota))
                                        {{ $responsable_mascota->apellido_uno }} {{ $responsable_mascota->apellido_dos }}
                                    @else
                                        Sin registro
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Email</label>
                                <div class="col-9 ml-2 text-secondary" id="email_responsable">
                                    {{ optional($responsable_mascota)->email ?? 'Sin registro' }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Teléfono</label>
                                <div class="col-9 ml-2 text-secondary" id="telefono_responsable">
                                    {{ optional($responsable_mascota)->telefono_uno ?? 'Sin registro' }}
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Dirección</label>
                                <div class="col-9 ml-2 text-secondary" id="direccion_responsable_text">
                                    @if (isset($responsable_mascota) && $responsable_mascota->Direccion()->first() != null)
                                        {{ $responsable_mascota->Direccion()->first()->direccion . ' ' . $responsable_mascota->Direccion()->first()->numero_dir }}
                                    @else
                                        Sin registro
                                    @endif
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1 text-dark">
                                <label class="col-2 text-dark font-weight-bolder">Comuna / Región</label>
                                <div class="col-9 ml-2 text-secondary" id="comuna_region_responsable">
                                    @if (isset($responsable_mascota) && $responsable_mascota->Direccion()->first() != null && $responsable_mascota->Direccion()->first()->Ciudad()->first() != null)
                                        {{ $responsable_mascota->Direccion()->first()->Ciudad()->first()->nombre }}<br>
                                        {{ $responsable_mascota->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                    @else
                                        Sin registro
                                    @endif
                                </div>
                            </div>
                            <div class="form-row mt-3 mb-5">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button type="button" class="btn btn-primary-light-c btn-xxs"
                                        onclick="editarInformacionResponsable()"><i class="feather icon-edit"></i> Editar
                                        información</button>
                                </div>
                            </div>
                        </div>
                        <div id="info_responsable-edit" style="display: none">
                            <div class="form-row pt-3">
                                <label class="col-2 text-dark font-weight-bolder">Rut</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="responsable_rut_edit" class="form-control"
                                        value="{{ optional($responsable_mascota)->rut ?? '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Nombre</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="responsable_nombre_edit" class="form-control"
                                        value="{{ optional($responsable_mascota)->nombres ?? '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Apellido Paterno</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="responsable_apellido_uno_edit" class="form-control"
                                        value="{{ optional($responsable_mascota)->apellido_uno ?? '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Apellido Materno</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="responsable_apellido_dos_edit" class="form-control"
                                        value="{{ optional($responsable_mascota)->apellido_dos ?? '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">FN</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="date" id="responsable_fn_edit" class="form-control"
                                        value="{{ optional($responsable_mascota)->fecha_nac ?? '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Sexo</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <select id="responsable_sexo_edit" class="form-control">
                                        <option value="M" @if (optional($responsable_mascota)->sexo == 'M') selected @endif>Masculino</option>
                                        <option value="F" @if (optional($responsable_mascota)->sexo == 'F') selected @endif>Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Dirección</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="responsable_dir_edit" class="form-control"
                                        value="{{ optional(optional($responsable_mascota)->Direccion()->first())->direccion ? optional($responsable_mascota->Direccion()->first())->direccion . ' ' . optional($responsable_mascota->Direccion()->first())->numero_dir : '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1 text-dark">
                                <label class="col-2 text-dark font-weight-bolder">Región</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <select id="responsable_region_edit" class="form-control" onchange="buscar_ciudad_responsable();">
                                        <option value="0">Seleccione región</option>
                                        @foreach ($regiones as $region)
                                            <option value="{{ $region->id }}"
                                                @if (optional(optional(optional($responsable_mascota)->Direccion()->first())->Ciudad()->first())->Region()->first() && $responsable_mascota->Direccion()->first()->Ciudad()->first()->Region()->first()->id == $region->id) selected @endif>{{ $region->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Comuna</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <select id="responsable_comuna_edit" class="form-control">
                                        <option value="0">Seleccione comuna</option>
                                        @foreach ($ciudades as $comuna)
                                            <option value="{{ $comuna->id }}"
                                                @if (optional(optional($responsable_mascota)->Direccion()->first())->Ciudad()->first() && $responsable_mascota->Direccion()->first()->Ciudad()->first()->id == $comuna->id) selected @endif>{{ $comuna->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Email</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="responsable_email_edit" class="form-control"
                                        value="{{ optional($responsable_mascota)->email ?? '' }}">
                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Teléfono</label>
                                <div class="col-9 ml-2 text-secondary">
                                    <input type="text" id="responsable_telefono_edit" class="form-control"
                                        value="{{ optional($responsable_mascota)->telefono_uno ?? '' }}">
                                </div>
                            </div>
                            <div class="form-row mt-3 mb-5">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button type="button" class="btn btn-primary-light-c btn-xxs"
                                        onclick="guardarInformacionResponsable({{ optional($responsable_mascota)->id ?? 0 }})"><i class="feather icon-save"></i>
                                        Guardar información</button>
                                    <button type="button" class="btn btn-danger-light-c btn-xxs"
                                        onclick="cancelarInformacionResponsable()"><i class="fas fa-trash"></i>Cancelar
                                        edición</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="card-sidebar">
                <div class="card-header-sidebar" id="headingTwo">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left collapsed text-info" type="button"
                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo"><i
                                class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                            CONTACTO DE EMERGENCIA
                        </button>
                    </h2>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body-sidebar">
                        <div id="info_contacto">
                            <div class="form-row pt-3">
                                <label class="col-2 text-dark font-weight-bolder">Rut</label>
                                <div class="col-9 ml-2 text-secondary">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            {{ $paciente->ContactosEmergencia()->first()->rut }}
                                        </span>
                                    @else
                                        <span class="info">Sin registro de contacto</span>
                                    @endif


                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Nombre</label>
                                <div class="col-9 ml-2 text-secondary" id="nombre_completo_contacto">
                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            {{ $paciente->ContactosEmergencia()->first()->nombre }}
                                        </span>
                                    @else
                                        <span class="info">Sin registro de contacto</span>
                                    @endif


                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Apellidos</label>
                                <div class="col-9 ml-2 text-secondary" id="apellidos_contacto">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            {{ $paciente->ContactosEmergencia()->first()->apellido_uno . ' ' . $paciente->ContactosEmergencia()->first()->apellido_dos }}
                                        </span>
                                    @else
                                        <span class="info">Sin registro de contacto</span>
                                    @endif


                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Dirección</label>
                                <div class="col-9 ml-2 text-secondary" id="direccion_contacto_text">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">

                                            {{ $paciente->ContactosEmergencia()->first()->Direccion()->first()->direccion .
                                                ' ' .
                                                $paciente->ContactosEmergencia()->first()->Direccion()->first()->numero_dir }}
                                        </span>
                                    @else
                                        <span class="info">Sin registro de contacto</span>
                                    @endif


                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Comuna / Región</label>
                                <div class="col-9 ml-2 text-secondary" id="comuna_region_contacto">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            {{ $paciente->ContactosEmergencia()->first()->Direccion()->first()->Ciudad()->first()->nombre }}
                                        </span>
                                    @else
                                        <span class="info">Sin registro de contacto</span>
                                    @endif



                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Email</label>
                                <div class="col-9 ml-2 text-secondary" id="email_contacto_">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            {{ $paciente->ContactosEmergencia()->first()->email }}
                                        </span>
                                    @else
                                        <span class="info">Sin registro de contacto</span>
                                    @endif

                                </div>
                            </div>
                            <hr class="mt-2">
                            <div class="form-row mt-1">
                                <label class="col-2 text-dark font-weight-bolder">Teléfono</label>
                                <div class="col-9 ml-2 text-secondary" id="telefono_contacto">

                                    @if ($paciente->ContactosEmergencia()->first() != null)
                                        <span class="info">
                                            {{ $paciente->ContactosEmergencia()->first()->telefono }}
                                        </span>
                                    @else
                                        <span class="info">Sin registro de contacto</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row mt-3 mb-5">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button type="button" class="btn btn-primary-light-c btn-xxs"
                                        onclick="editarInformacionContacto()"><i class="feather icon-edit"></i> Editar
                                        información</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($paciente->ContactosEmergencia()->exists())
                        <div id="info_contacto-edit" style="display: none">
                        <div class="form-row pt-3">
                            <label class="col-2 text-dark font-weight-bolder">Rut</label>
                            <div class="col-9 ml-2 text-secondary">
                               <input id="contacto_rut_edit" name="contacto_rut_edit" type="text" class="form-control form-control-sm" value="{{ $paciente->ContactosEmergencia()->first()->rut }}">
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-2  text-dark font-weight-bolder">Nombre</label>
                            <div class="col-9 ml-2 text-secondary">
                                <input id="contacto_nombre_edit" name="contacto_nombre_edit" type="text" class="form-control form-control-sm" value="{{ $paciente->ContactosEmergencia()->first()->nombre }}">
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-2 text-dark font-weight-bolder">Apellido Paterno</label>
                            <div class="col-9 ml-2 text-secondary">
                                <input id="contacto_apellido_uno" name="contacto_apellido_uno" type="text" class="form-control form-control-sm" value="{{ $paciente->ContactosEmergencia()->first()->apellido_uno }}">
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-2 text-dark font-weight-bolder">Apellido Materno</label>
                            <div class="col-9 ml-2 text-secondary">
                                <input id="contacto_apellido_dos" name="contacto_apellido_dos" type="text" class="form-control form-control-sm" value="{{ $paciente->ContactosEmergencia()->first()->apellido_dos }}">
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-2 text-dark font-weight-bolder">FN</label>
                            <div class="col-9 ml-2 text-secondary">
                                <input type="date" name="contacto_fn_edit" id="contacto_fn_edit" value="{{ $paciente->ContactosEmergencia()->first()->fecha_nac }}">
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-2 text-dark font-weight-bolder">Sexo</label>
                            <div class="col-9 ml-2 text-secondary">
                                <select name="contacto_sexo_edit" id="contacto_sexo_edit" class="form-control">
                                    <option value="M" @if ($paciente->ContactosEmergencia()->first()->sexo == 'M') selected @endif>Masculino
                                    </option>
                                    <option value="F" @if ($paciente->ContactosEmergencia()->first()->sexo == 'F') selected @endif>Femenino
                                    </option>
                                </select>
                            </div>
                        </div>
                        {{-- <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-2  text-c-blue font-weight-bolder">Convenios</label>
                            <div class="col-9 ml-2 text-secondary">

                            </div>
                        </div> --}}
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-2 text-dark font-weight-bolder">Dirección</label>
                            <div class="col-9 ml-2 text-secondary">
                                <input type="text" class="form-control" id="contacto_dir_edit"
                                    value="{{ $paciente->ContactosEmergencia()->first()->Direccion()->first()->direccion .
                                                ' ' .
                                                $paciente->ContactosEmergencia()->first()->Direccion()->first()->numero_dir }}">
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1 text-dark ">
                            <label class="col-2 text-dark font-weight-bolder">Región</label>
                            <div class="col-9 ml-2 text-secondary">
                                <select name="contacto_region_edit" onchange="buscar_ciudad_contacto({{ $paciente->ContactosEmergencia()->first()->Direccion()->first()->Ciudad()->first()->id }});" id="contacto_region_edit" class="form-control"
                                    >
                                    <option value="0">Seleccione región</option>
                                    @foreach ($regiones as $region)
                                        <option value="{{ $region->id }}"
                                            @if ($paciente->ContactosEmergencia()->first()->Direccion()->first()->Ciudad()->first()->Region()->first()->id == $region->id) selected @endif>{{ $region->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-2 text-dark font-weight-bolder">Comuna</label>
                            <div class="col-9 ml-2 text-secondary">
                                <select name="contacto_comuna_edit" id="contacto_comuna_edit" class="form-control">
                                    <option value="0">Seleccione comuna</option>
                                    @foreach ($paciente->comunas_contacto_emer as $comuna)
                                        <option value="{{ $comuna->id }}"
                                            @if ($paciente->ContactosEmergencia()->first()->Direccion()->first()->Ciudad()->first()->id == $comuna->id) selected @endif>{{ $comuna->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-2 text-dark font-weight-bolder">Email</label>
                            <div class="col-9 ml-2 text-secondary">
                                <input type="text" id="contacto_email_edit" name="contacto_email_edit"
                                    class="form-control" value="{{ $paciente->ContactosEmergencia()->first()->email }}">
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-2 text-dark font-weight-bolder">Teléfono</label>
                            <div class="col-9 ml-2 text-secondary">
                                <input type="text" class="form-control" id="contacto_telefono_edit"
                                    name="contacto_telefono_edit" value="{{ $paciente->ContactosEmergencia()->first()->telefono }}">
                            </div>
                        </div>
                        <div class="form-row mt-3 mb-5">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-primary-light-c btn-xxs"
                                    onclick="guardarInformacionContacto()"><i class="feather icon-save"></i> Guardar
                                    información</button>
                                <button type="button" class="btn btn-danger-light-c btn-xxs"
                                    onclick="cancelarInformacionContacto()"><i class="fas fa-trash"></i>Cancelar
                                    edición</button>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="alert alert-warning">
                            El paciente no tiene contacto de emergencia registrado.
                        </div>
                    @endif

                </div>
            </div>
        <div class="card-sidebar">
            <div class="card-header-sidebar" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-light btn-block text-left collapsed text-info" type="button"
                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                        aria-controls="collapseThree"><i
                            class="feather icon-chevron-down float-right pt-1 flecha-accordion"></i>
                        ANTECEDENTES MÉDICOS
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body-sidebar">
                    @if (isset($mascota) && $mascota)
                        <div class="form-row pt-3">
                            <label class="col-4 text-danger font-weight-bolder">Diagnostico</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $ficha_atencion_mascota->hipotesis_diagnostico ?? $ficha_atencion_mascota->diagnostico_ce10 ?? 'Sin registro' }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">Motivo</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $ficha_atencion_mascota->motivo ?? 'Sin registro' }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">Antecedentes</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $ficha_atencion_mascota->antecedentes ?? 'Sin registro' }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">Indicaciones</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $ficha_atencion_mascota->indicaciones ?? 'Sin registro' }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">Temperatura</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $ficha_atencion_mascota->temperatura ?? 'Sin registro' }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">Peso</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $ficha_atencion_mascota->peso ?? 'Sin registro' }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">Pulso</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $ficha_atencion_mascota->pulso ?? 'Sin registro' }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">Frec. reposo</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $ficha_atencion_mascota->frecuencia_reposo ?? 'Sin registro' }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">Presion</label>
                            <div class="col-7 ml-2 text-secondary">
                                @if (isset($ficha_atencion_mascota) && ($ficha_atencion_mascota->presion_bi || $ficha_atencion_mascota->presion_bd))
                                    {{ trim(($ficha_atencion_mascota->presion_bi ?? '') . '/' . ($ficha_atencion_mascota->presion_bd ?? ''), '/') }}
                                @else
                                    Sin registro
                                @endif
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">IMC</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $ficha_atencion_mascota->imc ?? 'Sin registro' }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">Estado nutricional</label>
                            <div class="col-7 ml-2 text-secondary">
                                {{ $ficha_atencion_mascota->estado_nutricional ?? 'Sin registro' }}
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">Cronico</label>
                            <div class="col-7 ml-2 text-secondary">
                                @if (isset($ficha_atencion_mascota))
                                    {{ $ficha_atencion_mascota->cronico ? 'Si' : 'No' }}
                                @else
                                    Sin registro
                                @endif
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">Fecha ficha</label>
                            <div class="col-7 ml-2 text-secondary">
                                @if (isset($ficha_atencion_mascota) && $ficha_atencion_mascota->created_at)
                                    {{ \Carbon\Carbon::parse($ficha_atencion_mascota->created_at)->format('d-m-Y') }}
                                @else
                                    Sin registro
                                @endif
                            </div>
                        </div>
                    @else
                    <div class="form-row pt-3">
                        <label class="col-4 text-danger font-weight-bolder">Medicamentos Crónicos</label>
                        <div class="col-7 ml-2 text-secondary listas_sidebar">
                            <ul>

                                @if (isset($medicamentos_cronicos))
                                    @foreach ($medicamentos_cronicos as $med_cronico)
                                        <li>{{ $med_cronico->nombre_medicamento_cronico }}</li>
                                    @endforeach
                                @else
                                    <li>Sin registro</li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-danger font-weight-bolder">Alergias e Intolerancias</label>
                        <div class="col-7 ml-2 text-secondary listas_sidebar">
                            <ul>

                                @if (isset($alergias) && count($alergias) > 0)
                                    @foreach ($alergias as $alergia)
                                        <li>{{ $alergia->nombre_alergia }}</li>
                                    @endforeach
                                @else
                                    <li>Sin registro</li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4  text-dark font-weight-bolder">Discapacidad</label>
                        <div class="col-7  ml-2 text-secondary">
                            <ul>
                                @if (isset($discapacidades) && count($discapacidades) > 0)
                                    @foreach ($discapacidades as $d)
                                        <li>{{ $d->nombre }}</li>
                                    @endforeach
                                @else
                                    <li>Sin registro</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-dark font-weight-bolder">Operaciones</label>
                        <div class="col-7 ml-2 text-secondary listas_sidebar">
                            <ul>

                                @if (isset($antecedentes_quirurgicos))
                                    @foreach ($antecedentes_quirurgicos as $antecedente_quirurgico)
                                        <li>{{ $antecedente_quirurgico->operacion }}</li>
                                    @endforeach
                                @else
                                    <li>Sin registro</li>
                                @endif

                            </ul>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-dark font-weight-bolder">Incidentes en Cirugía</label>
                        <div class="col-7 ml-2 text-secondary listas_sidebar">
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-dark font-weight-bolder">Grupo Sanguíneo</label>
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
                        <label class="col-4 text-dark font-weight-bolder">¿Acepta Transfusión de Sangre?</label>
                        <div class="col-7 ml-2 text-secondary">
                            @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->transfusion == 1)
                                Si
                            @else
                                Sin registro
                            @endif
                        </div>
                    </div>
                    <hr class="mt-2">
                    <div class="form-row mt-1">
                        <label class="col-4 text-dark font-weight-bolder">¿Donante de Órganos?</label>
                        <div class="col-7 ml-2 text-secondary">
                            @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos == 1)
                                Si
                            @else
                                Sin registro
                            @endif
                        </div>
                    </div>
                    @endif
                    {{-- <div class="form-row mt-3 mb-5">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <button type="button" class="btn btn-primary-light-c btn-xxs"><i
                                    class="feather icon-edit"></i> Editar información</button>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- <div class="card-sidebar">
                <div class="card-header-sidebar" id="headingThree">
                    <h2 class="mb-0">
                        <button class="btn btn-light btn-block text-left text-info collapsed" type="button"
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
                        <div class="form-row pt-3">
                            <label class="col-4 text-dark font-weight-bolder">
                                ¿Es paciente crónico?
                            </label>
                            <div class="col-7 ml-2 text-secondary">
                                @if ($patoligias_cronicas != null && $patoligias_cronicas != '')
                                    Si
                                @else
                                    No
                                @endif
                            </div>
                        </div>
                        <hr class="mt-2">
                        <div class="form-row mt-1">
                            <label class="col-4 text-dark font-weight-bolder">
                                Patologías Crónicas
                            </label>
                            <div class="col-7 ml-2 text-secondary listas_sidebar">
                                <ul>
                                    @if (isset($patoligias_cronicas))
                                        @foreach ($patoligias_cronicas as $patoligia_cronica)
                                            <li>{{ $patoligia_cronica->nombre_patologia_cronica }}</li>
                                        @endforeach
                                    @else
                                        <li>Sin registro</li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                        <div class="form-row mt-3 mb-5">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <button type="button" class="btn btn-primary-light-c btn-xxs"><i
                                        class="feather icon-edit"></i> Editar información</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

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
<script>
window.addEventListener('load', function () {
    window.editarInformacionContacto = function () {
        $('#info_contacto').css('display', 'none');
        $('#info_contacto-edit').css('display', 'block');
    };

    window.cancelarInformacionContacto = function () {
        $('#info_contacto').css('display', 'block');
        $('#info_contacto-edit').css('display', 'none');
    };

    window.guardarInformacionContacto = function () {
        let data = {
            rut: $('#contacto_rut_edit').val(),
            nombre: $('#contacto_nombre_edit').val(),
            apellido_uno: $('#contacto_apellido_uno').val(),
            apellido_dos: $('#contacto_apellido_dos').val(),
            fn: $('#contacto_fn_edit').val(),
            sexo: $('#contacto_sexo_edit').val(),
            direccion: $('#contacto_dir_edit').val(),
            region: $('#contacto_region_edit').val(),
            comuna: $('#contacto_comuna_edit').val(),
            email: $('#contacto_email_edit').val(),
            telefono: $('#contacto_telefono_edit').val(),
            _token: CSRF_TOKEN
        };

        let url = "{{ ROUTE('asistente.contacto.modificar') }}";

        $.ajax({
            url: url,
            type: "get",
            data: data,
        })
        .done(function (data) {
            if (data && data.estado == 1) {
                let contacto = data.contacto || {};
                if (contacto.nombres !== undefined) {
                    $('#nombre_completo_contacto').text(contacto.nombres);
                }
                if (contacto.apellido_uno !== undefined || contacto.apellido_dos !== undefined) {
                    $('#apellidos_contacto').text((contacto.apellido_uno || '') + ' ' + (contacto.apellido_dos || ''));
                }
                if (contacto.email !== undefined) {
                    $('#email_contacto_').text(contacto.email);
                }
                if (contacto.telefono_uno !== undefined) {
                    $('#telefono_contacto').text(contacto.telefono_uno);
                } else if (contacto.telefono !== undefined) {
                    $('#telefono_contacto').text(contacto.telefono);
                }
                if (contacto.ciudad !== undefined || contacto.region !== undefined) {
                    $('#comuna_region_contacto').html((contacto.ciudad || '') + '<br> ' + (contacto.region || ''));
                } else if (data.ciudad || data.region) {
                    let ciudad = data.ciudad && data.ciudad.nombre ? data.ciudad.nombre : '';
                    let region = data.region && data.region.nombre ? data.region.nombre : '';
                    $('#comuna_region_contacto').html(ciudad + '<br> ' + region);
                }
                if (data.direccion && data.direccion.direccion) {
                    let numero = data.direccion.numero_dir ? (' ' + data.direccion.numero_dir) : '';
                    $('#direccion_contacto_text').text(data.direccion.direccion + numero);
                } else if (contacto.direccion !== undefined) {
                    $('#direccion_contacto_text').text(contacto.direccion);
                }

                swal({
                    title: "Actualización de Contacto",
                    text: "Actualización Exitosa",
                    icon: "success",
                });
                cancelarInformacionContacto();
            } else {
                swal({
                    title: "Actualización de Paciente",
                    text: "Falla en Actualización.\nIntente de nuevo.",
                    icon: "error",
                });
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError);
        });
    };

    window.editarInformacionMascota = function () {
        $('#info_mascota').css('display', 'none');
        $('#info_mascota-edit').css('display', 'block');
    };

    window.cancelarInformacionMascota = function () {
        $('#info_mascota').css('display', 'block');
        $('#info_mascota-edit').css('display', 'none');
    };

    window.guardarInformacionMascota = function (idMascota) {
        if (!idMascota) {
            swal({
                title: "Mascota",
                text: "Mascota no encontrada",
                icon: "error",
            });
            return;
        }

        let data = {
            tiene_chip: $('#mascota_tiene_chip_edit').val(),
            chip: $('#mascota_chip_edit').val(),
            nombre: $('#mascota_nombre_edit').val(),
            especie_id: $('#mascota_especie_edit').val(),
            otra_especie: $('#mascota_otra_especie_edit').val(),
            tamano_id: $('#mascota_tamano_edit').val(),
            fecha_nacimiento: $('#mascota_fn_edit').val(),
            sexo: $('#mascota_sexo_edit').val(),
            esterilizado: $('#mascota_esterilizado_edit').val(),
            fecha_esterilizacion: $('#mascota_fecha_esterilizacion_edit').val(),
            enfermedad_cronica: $('#mascota_enfermedad_cronica_edit').val(),
            _token: CSRF_TOKEN,
            _method: 'PUT'
        };

        let url = "{{ isset($mascota) ? route('paciente.mascotas.update', $mascota->id) : '' }}";
        if (!url) {
            swal({
                title: "Mascota",
                text: "No se pudo determinar la ruta de actualización.",
                icon: "error",
            });
            return;
        }

        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function (data) {
            if (data && data.estado == 1) {
                let registro = data.registro || {};
                if (registro.nombre !== undefined) {
                    $('#mascota_nombre_text').text(registro.nombre);
                }
                if (registro.especieMascota && registro.especieMascota.nombre) {
                    $('#mascota_especie_text').text(registro.especieMascota.nombre);
                } else if (registro.otra_especie) {
                    $('#mascota_especie_text').text(registro.otra_especie);
                }
                if (registro.sexo !== undefined) {
                    $('#mascota_sexo_text').text(registro.sexo === 'M' ? 'Macho' : (registro.sexo === 'F' ? 'Hembra' : registro.sexo));
                }
                if (registro.fecha_nacimiento !== undefined) {
                    $('#mascota_fn_text').text(registro.fecha_nacimiento || 'Sin registro');
                }
                if (registro.tamanoMascota && registro.tamanoMascota.nombre) {
                    $('#mascota_tamano_text').text(registro.tamanoMascota.nombre);
                }
                if (registro.tiene_chip !== undefined) {
                    let chipText = registro.tiene_chip ? (registro.chip || 'Si') : 'No';
                    $('#mascota_chip_text').text(chipText);
                }
                if (registro.esterilizado !== undefined) {
                    $('#mascota_esterilizado_text').text(registro.esterilizado ? 'Si' : 'No');
                }
                if (registro.enfermedad_cronica !== undefined) {
                    $('#mascota_enf_cronica_text').text(registro.enfermedad_cronica || 'Sin registro');
                }

                swal({
                    title: "Mascota",
                    text: "Actualización Exitosa",
                    icon: "success",
                });
                cancelarInformacionMascota();
            } else {
                let texto_error = '';
                if (data && data.error) {
                    Object.keys(data.error).forEach(function (key) {
                        texto_error += key + ': ' + data.error[key] + '\\n';
                    });
                }
                swal({
                    title: "Mascota",
                    text: (data && data.msj ? data.msj : "Falla en Actualización.") + '\\n' + texto_error,
                    icon: "error",
                });
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError);
        });
    };

    window.editarInformacionResponsable = function () {
        $('#info_responsable').css('display', 'none');
        $('#info_responsable-edit').css('display', 'block');
    };

    window.cancelarInformacionResponsable = function () {
        $('#info_responsable').css('display', 'block');
        $('#info_responsable-edit').css('display', 'none');
    };

    window.guardarInformacionResponsable = function (idResponsable) {
        if (!idResponsable) {
            swal({
                title: "Responsable",
                text: "Responsable no encontrado",
                icon: "error",
            });
            return;
        }

        let data = {
            id: idResponsable,
            nombre: $('#responsable_nombre_edit').val(),
            apellido_uno: $('#responsable_apellido_uno_edit').val(),
            apellido_dos: $('#responsable_apellido_dos_edit').val(),
            fecha_nacimiento: $('#responsable_fn_edit').val(),
            sexo: $('#responsable_sexo_edit').val(),
            direccion: $('#responsable_dir_edit').val(),
            region: $('#responsable_region_edit').val(),
            ciudad: $('#responsable_comuna_edit').val(),
            email: $('#responsable_email_edit').val(),
            telefono: $('#responsable_telefono_edit').val(),
            _token: CSRF_TOKEN
        };

        let url = "{{ route('asistente.paciente.modificar') }}";

        $.ajax({
            url: url,
            type: "get",
            data: data,
        })
        .done(function (data) {
            if (data && data.estado == 1) {
                let registro = data.paciente || data.registro || {};
                if (registro.rut !== undefined) {
                    $('#rut_responsable').text(registro.rut);
                }
                if (registro.nombres !== undefined) {
                    $('#nombre_responsable').text(registro.nombres);
                }
                if (registro.apellido_uno !== undefined || registro.apellido_dos !== undefined) {
                    $('#apellidos_responsable').text((registro.apellido_uno || '') + ' ' + (registro.apellido_dos || ''));
                }
                if (registro.email !== undefined) {
                    $('#email_responsable').text(registro.email);
                }
                if (registro.telefono_uno !== undefined) {
                    $('#telefono_responsable').text(registro.telefono_uno);
                }
                if (data.direccion && data.direccion.direccion) {
                    let numero = data.direccion.numero_dir ? (' ' + data.direccion.numero_dir) : '';
                    $('#direccion_responsable_text').text(data.direccion.direccion + numero);
                }
                if (data.ciudad || data.region) {
                    let ciudad = data.ciudad && data.ciudad.nombre ? data.ciudad.nombre : '';
                    let region = data.region && data.region.nombre ? data.region.nombre : '';
                    $('#comuna_region_responsable').html(ciudad + '<br> ' + region);
                }

                swal({
                    title: "Responsable",
                    text: "Actualización Exitosa",
                    icon: "success",
                });
                cancelarInformacionResponsable();
            } else {
                swal({
                    title: "Responsable",
                    text: "Falla en Actualización.\nIntente de nuevo.",
                    icon: "error",
                });
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError);
        });
    };

    window.buscar_ciudad_responsable = function (id_ciudad = 0) {
        let region = $('#responsable_region_edit').val();
        let url = "{{ route('profesional.buscar_ciudad_region') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                region: region,
            },
        })
        .done(function (data) {
            if (data != null) {
                data = JSON.parse(data);
                let ciudades = $('#responsable_comuna_edit');
                ciudades.find('option').remove();
                ciudades.append('<option value="0">seleccione</option>');
                $(data).each(function (i, v) {
                    ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                });

                if (id_ciudad != 0) {
                    ciudades.val(id_ciudad);
                }
            } else {
                swal({
                    title: "Error",
                    text: "Error al cargar las ciudades",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError);
        });
    };
});
</script>
