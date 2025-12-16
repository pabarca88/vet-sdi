<div class="row">
    @if ($cargo == 'director_cm' && isset($director_cm))
        @if (isset($director_cm) && $director_cm != null)
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between bg-info">
                        <h5 class="mb-0 text-white">Perfil Director Médico</h5>
                        <div class="float-md-right d-inline">
                            <button type="button" class="btn btn-light btn-icon" data-toggle="collapse"
                                data-target=".info_basica_director_cm" aria-expanded="false"
                                aria-controls="info_basica-1_ info_basica-2">
                                <i class="feather icon-edit"></i>
                            </button>
                            <button type="button" class="btn btn-light btn-icon"
                                onclick="eliminar_admin_cm(1,{{ $institucion->id }})"><i
                                    class="feather icon-x"></i></button>
                        </div>
                    </div>
                    <!--Datos Personales-->
                    <div class="card-body info_basica_director_cm collapse show" id="info_basica-1_">
                        <form>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <!--DATOS PERSONALES-->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                            <p class="text-c-blue font-weight-bolder">DATOS PERSONALES</p>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Rut</label>
                                            <div class=""> {{ $director_cm->rut }} </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Nombre</label>
                                            <div class=""> {{ $director_cm->nombre }} </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Primer
                                                Apellido</label>
                                            <div> {{ $director_cm->apellido_uno }}
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Segundo
                                                Apellido</label>
                                            <div> {{ $director_cm->apellido_dos }}
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Sexo</label>
                                            <div>
                                                @if ($director_cm->sexo == 'F')
                                                    Mujer
                                                @elseif ($director_cm->sexo == 'M')
                                                    Hombre
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Nacimiento</label>
                                            <div>
                                                {{ \Carbon\Carbon::parse($director_cm->fecha_nac)->format('d-m-Y') }}
                                            </div>
                                        </div>
                                    </div>
                                    <!--CONTACTO-->
                                    <div class="form-row mt-4">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                            <p class="text-c-blue font-weight-bolder">CONTACTO</p>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Correo
                                                Electrónico</label>
                                            <div> {{ $director_cm->email }} </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Celular</label>
                                            <div>{{ $director_cm->telefono_uno }}</div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Teléfono</label>
                                            <div>{{ $director_cm->telefono_dos }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <!--RESIDENCIA-->
                                    <div class="form-row mtop-4">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                            <p class="text-c-blue font-weight-bolder">RESIDENCIA</p>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Región</label>
                                            <div>
                                                {{ $director_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Comuna</label>
                                            <div>
                                                {{ $director_cm->Direccion()->first()->Ciudad()->first()->nombre }}
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="font-weight-bolder ml-0 mb-0">Dirección</label>
                                            <div>
                                                {{ $director_cm->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                            </div>
                                        </div>
                                    </div>
                                    <!--CONTRASEÑA-->
                                    <div class="form-row mt-4">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                            <p class="text-c-blue font-weight-bolder">CONTRASEÑA</p>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="font-weight-bolder ml-0 mb-0">Contraseña actual</label>
                                            <div> •••••••• </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Cierre: Datos Personales-->
                    <!--(Editar)Datos Personales-->
                    <div class="card-body  info_basica_director_cm collapse" id="pinfo_basica_2">
                        <form>
                            <!--NUEVO EDITAR-->
                            <div class="form-row">
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <!--EDITAR DATOS PERSONALES-->
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                            <p class="font-weight-bolder">DATOS PERSONALES</p>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Rut</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="perfil_rut_medico" name="perfil_rut_medico"
                                                value="{{ $director_cm->rut }}" disabled>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Nombre</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="perfil_nombre_medico" name="perfil_nombre_medico"
                                                value="{{ $director_cm->nombre }}">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Primer Apellido</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="perfil_apellido_uno_medico" name="perfil_apellido_uno_medico"
                                                value="{{ $director_cm->apellido_uno }}">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Segundo Apellido</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="perfil_apellido_dos_medico" name="perfil_apellido_dos_medico"
                                                value="{{ $director_cm->apellido_dos }}">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Sexo</label>
                                            <div class="form-check form-check-inline mt-3">
                                                <input class="form-check-input" type="radio"
                                                    id="perfil_sexo_medico" name="perfil_sexo_medico"
                                                    id="inlineRadio2" value="F"
                                                    @if ($director_cm->sexo == 'F') checked @endif>
                                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio"
                                                    id="perfil_sexo_medico" name="perfil_sexo_medico"
                                                    id="inlineRadio1" value="M"
                                                    @if ($director_cm->sexo == 'M') checked @endif>
                                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Nacimiento</label>
                                            <input type="date" class="form-control form-control-sm"
                                                id="perfil_nac_medico" name="perfil_nac_medico"
                                                value="{{ $director_cm->fecha_nac }}">
                                        </div>
                                    </div>
                                    <!--EDITAR CONTACTO-->
                                    <div class="form-row mt-4">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                            <p class="font-weight-bolder">CONTACTO</p>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Correo electrónico</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="Perfil_email" name="Perfil_email"
                                                value="{{ $director_cm->email }}">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Celular</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="Perfil_fono" name="Perfil_fono"
                                                value="{{ $director_cm->telefono_uno }}">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Teléfono</label>
                                            <input type="text" class="form-control form-control-sm"
                                                id="Perfil_fono_dos" name="Perfil_fono_dos"
                                                value="{{ $director_cm->telefono_dos }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <!--EDITAR RESIDENCIA-->
                                    <div class="form-row mtop-4">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                            <p class="font-weight-bolder">RESIDENCIA</p>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Región</label>
                                            <select class="form-control form-control-sm"
                                                onchange="buscar_ciudad_responsable();" id="perfil_region"
                                                name="perfil_region">
                                                <option value="">Seleccione una Región</option>
                                                @if (isset($regiones))
                                                    @foreach ($regiones as $region)
                                                        <option value="{{ $region->id }}"
                                                            @if ($region->id == $director_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                            {{ $region->nombre }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Comuna</label>
                                            <select class="form-control form-control-sm" id="perfil_ciudad"
                                                name="perfil_ciudad">
                                                <option value="">Seleccione su comuna</option>
                                                @if (isset($ciudades))
                                                    @foreach ($ciudades as $ciudad)
                                                        <option value="{{ $ciudad->id }}"
                                                            @if ($director_cm->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
                                                            {{ $ciudad->nombre }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                            <label class="floating-label-activo-sm">Dirección</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="perfil_dire" id="perfil_dire"
                                                value="{{ $director_cm->Direccion()->first()->direccion }}">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                            <label class="floating-label-activo-sm">Nº</label>
                                            <input type="text" class="form-control form-control-sm"
                                                name="perfil_numero_dir" id="perfil_numero_dir"
                                                value="{{ $director_cm->Direccion()->first()->numero_dir }}">
                                        </div>
                                    </div>
                                    <!--EDITAR CONTRASEÑA-->
                                    <div class="form-row mt-4">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                            <p class="font-weight-bolder">CONTRASEÑA</p>
                                        </div>
                                        <form method="get"
                                            action="{{ route('adm_cm.cambio_contrasena_responsable') }}"
                                            id="form_cambio_contrasena_perfil_responsable"
                                            name="form_cambio_contrasena_perfil_responsable">
                                            <input type="hidden" name="responsable_id" id="responsable_id"
                                                value="{{ $responsable->Usuario()->first()->id }}">
                                            @csrf
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Contraseña actual</label>
                                                <input type="password" class="form-control form-control-sm"
                                                    name="responsable_actual" id="responsable_actual">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Nueva contraseña</label>
                                                <input type="password" class="form-control form-control-sm"
                                                    name="responsable_nueva" id="responsable_nueva">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <label class="floating-label-activo-sm">Repitir contraseña</label>
                                                <input type="password" class="form-control form-control-sm"
                                                    name="responsable_validacion" id="responsable_validacion">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label"></label>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-danger btn-sm mr-2"><i
                                            class="feather icon-x"></i> Cancelar</button>
                                    <button type="button" onclick="editar_responsable_medico_datos_personales();"
                                        class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar
                                        cambios</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--Cierre: (Editar)Datos Personales-->
                </div>
            </div>
        @endif
    @endif
    @if ($cargo == 'subdirector_cm' && isset($subdirector_cm) && $subdirector_cm != null)
        <!--NUEVO-->
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between bg-info">
                    <h5 class="mb-0 text-white">Perfil Administrador Comercial</h5>
                    <div class="float-md-right d-inline">
                        <button type="button" class="btn btn-light btn-icon m-0" data-toggle="collapse" data-target=".info_basica_subdirector_cm" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                            <i class="feather icon-edit"></i>
                        </button>
                        <button type="button" class="btn btn-light btn-icon" onclick="eliminar_admin_cm(2,{{ $institucion->id }})"><i class="feather icon-x"></i></button>
                    </div>
                </div>
                <!--Datos Personales-->
                <div class="card-body info_basica_subdirector_cm collapse show" id="info_basica-1">
                    <form>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <!--DATOS PERSONALES-->
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                        <p class="text-c-blue font-weight-bolder">DATOS PERSONALES</p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Rut</label>
                                        <div class=""> {{$subdirector_cm->rut }} </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Nombre</label>
                                        <div class=""> {{$subdirector_cm->nombre }} </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <label class="font-weight-bolder ml-0 mb-0">Primer
                                        Apellido</label>
                                        <div> {{$subdirector_cm->apellido_uno }}
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Segundo
                                            Apellido</label>
                                        <div> {{$subdirector_cm->apellido_dos }}
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Sexo</label>
                                        <div>
                                            @if ($subdirector_cm->sexo == 'F')
                                                Mujer
                                            @elseif ($subdirector_cm->sexo == 'M')
                                                Hombre
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Nacimiento</label>
                                        <div>
                                            {{ \Carbon\Carbon::parse($subdirector_cm->fecha_nac)->format('d-m-Y') }}
                                        </div>
                                    </div>
                                </div>
                                <!--CONTACTO-->
                                <div class="form-row mt-4">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                        <p class="text-c-blue font-weight-bolder">CONTACTO</p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Correo
                                            Electrónico</label>
                                        <div> {{$subdirector_cm->email }} </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Celular</label>
                                        <div>{{$subdirector_cm->telefono_uno }}</div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Teléfono</label>
                                        <div>{{$subdirector_cm->telefono_dos }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <!--RESIDENCIA-->
                                <div class="form-row mtop-4">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                        <p class="text-c-blue font-weight-bolder">RESIDENCIA</p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Región</label>
                                        <div>
                                            {{$subdirector_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Comuna</label>
                                        <div>
                                            {{$subdirector_cm->Direccion()->first()->Ciudad()->first()->nombre }}
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="font-weight-bolder ml-0 mb-0">Dirección</label>
                                        <div>
                                            {{$subdirector_cm->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                        </div>
                                    </div>
                                </div>
                                <!--CONTRASEÑA-->
                                <div class="form-row mt-4">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                    <p class="text-c-blue font-weight-bolder">CONTRASEÑA</p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="font-weight-bolder ml-0 mb-0">Contraseña actual</label>
                                        <div> •••••••• </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Cierre: Datos Personales-->
                <!--(Editar)Datos Personales-->

                <div class="card-body info_basica_subdirector_cm collapse" id="pinfo_basica_2">
                    <form>
                        <!--NUEVO EDITAR-->
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <!--EDITAR DATOS PERSONALES-->
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                        <p class="font-weight-bolder">DATOS PERSONALES</p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Rut</label>
                                        <input type="text" class="form-control form-control-sm" id="perfil_rut_medico" name="perfil_rut_medico" value="{{$subdirector_cm->rut }}" disabled>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Nombre</label>
                                        <input type="text" class="form-control form-control-sm" id="perfil_nombre_medico" name="perfil_nombre_medico" value="{{$subdirector_cm->nombre }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                        <input type="text" class="form-control form-control-sm" id="perfil_apellido_uno_medico" name="perfil_apellido_uno_medico"  value="{{$subdirector_cm->apellido_uno }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                        <input type="text" class="form-control form-control-sm" id="perfil_apellido_dos_medico" name="perfil_apellido_dos_medico"  value="{{$subdirector_cm->apellido_dos }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Sexo</label>
                                        <div class="form-check form-check-inline mt-3">
                                            <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio2" value="F" @if ($subdirector_cm->sexo == 'F') checked @endif>
                                            <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio1" value="M" @if ($subdirector_cm->sexo == 'M') checked @endif>
                                            <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Nacimiento</label>
                                        <input type="date" class="form-control form-control-sm" id="perfil_nac_medico" name="perfil_nac_medico" value="{{$subdirector_cm->fecha_nac }}">
                                    </div>
                                </div>
                                <!--EDITAR CONTACTO-->
                                <div class="form-row mt-4">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                        <p class="font-weight-bolder">CONTACTO</p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Correo electrónico</label>
                                        <input type="text" class="form-control form-control-sm" id="Perfil_email" name="Perfil_email" value="{{$subdirector_cm->email }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Celular</label>
                                        <input type="text" class="form-control form-control-sm"  id="Perfil_fono" name="Perfil_fono" value="{{$subdirector_cm->telefono_uno }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Teléfono</label>
                                        <input type="text" class="form-control form-control-sm"  id="Perfil_fono_dos" name="Perfil_fono_dos" value="{{$subdirector_cm->telefono_dos }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <!--EDITAR RESIDENCIA-->
                                @if(isset($subdirector_cm))
                                <div class="form-row mtop-4">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                        <p class="font-weight-bolder">RESIDENCIA</p>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Región</label>
                                        <select class="form-control form-control-sm" onchange="buscar_ciudad_responsable();" id="perfil_region" name="perfil_region">
                                            <option value="">Seleccione una Región</option>
                                            @if (isset($regiones))
                                                @foreach ($regiones as $region)
                                                <option value="{{ $region->id }}" @if ($region->id ==
                                                $subdirector_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                    {{ $region->nombre }}
                                                </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Comuna</label>
                                        <select class="form-control form-control-sm" id="perfil_ciudad" name="perfil_ciudad">
                                            <option value="">Seleccione su comuna</option>
                                            @if (isset($ciudades))
                                                @foreach ($ciudades as $ciudad)
                                                <option value="{{ $ciudad->id }}" @if ($subdirector_cm->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
                                                    {{ $ciudad->nombre }}
                                                </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                        <label class="floating-label-activo-sm">Dirección</label>
                                        <input type="text" class="form-control form-control-sm"  name="perfil_dire" id="perfil_dire" value="{{$subdirector_cm->Direccion()->first()->direccion }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                        <label class="floating-label-activo-sm">Nº</label>
                                        <input type="text" class="form-control form-control-sm"  name="perfil_numero_dir" id="perfil_numero_dir" value="{{$subdirector_cm->Direccion()->first()->numero_dir }}">
                                    </div>
                                </div>
                                @endif
                                <!--EDITAR CONTRASEÑA-->
                                <div class="form-row mt-4">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                        <p class="font-weight-bolder">CONTRASEÑA</p>
                                    </div>
                                    <form method="get" action="{{ route('adm_cm.cambio_contrasena_responsable')}}" id="form_cambio_contrasena_perfil_responsable" name="form_cambio_contrasena_perfil_responsable">
                                        <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $responsable->Usuario()->first()->id }}">
                                        @csrf
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Contraseña actual</label>
                                            <input type="password" class="form-control form-control-sm" name="responsable_actual" id="responsable_actual">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Nueva contraseña</label>
                                            <input type="password" class="form-control form-control-sm" name="responsable_nueva" id="responsable_nueva">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Repitir contraseña</label>
                                            <input type="password" class="form-control form-control-sm" name="responsable_validacion" id="responsable_validacion">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label"></label>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-danger btn-sm mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                <button type="button" onclick="editar_responsable_medico_datos_personales();" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Cierre: (Editar)Datos Personales-->
            </div>
        </div>
        <!-- FIN -->
    @endif

</div>
