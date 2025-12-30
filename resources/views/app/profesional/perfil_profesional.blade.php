@extends('template.profesional.template')
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="font-weight-bolder">Editar perfil</h5>
                            </div>
                            <ul class="breadcrumb mb-4">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top"
                                        title="Volver a mi escritorio">
                                        <i class="feather icon-home">
                                        </i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Editar perfil</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-profile user-card mb-4">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12 text-center mt-n4">
                                <div class="change-profile text-center">
                                    <div class="dropdown w-auto d-inline-block">
                                        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="profile-dp">
                                                <div class="position-relative d-inline-block">
                                                    <img class="img-radius img-fluid wid-100" id="profile-image"
                                                        src="{{ $profesional->foto_perfil ? asset('storage/' . $profesional->foto_perfil) : asset('images/iconos/usuario_profesional.svg') }}"
                                                        alt="User image">
                                                </div>
                                                <div class="overlay">
                                                    <span>Actualizar</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" onclick="document.getElementById('foto-perfil-input').click()">
                                                <i class="feather icon-upload-cloud mr-2"></i>Cambiar foto de perfil
                                            </a>
                                            <a class="dropdown-item" href="#" onclick="eliminar_foto_perfil()">
                                                <i class="feather icon-trash-2 mr-2"></i>Eliminar fotografía
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Input file oculto para seleccionar imagen -->
                                    <input type="file" id="foto-perfil-input" accept="image/*" style="display: none;" onchange="cambiar_foto_perfil(this)">
                                </div>
                            </div>
                            <div class="col-md-12 mt-md-2 m-0">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-1" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="info-personal-tab" data-toggle="tab"
                                            href="#info-personal" role="tab" aria-controls="info-personal"
                                            aria-selected="true">Información personal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="info-academico-tab" data-toggle="tab"
                                            href="#info-academico" role="tab" aria-controls="info-academico"
                                            aria-selected="false">Antecedentes académicos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="pass-tab" data-toggle="tab" href="#pass"
                                            role="tab" aria-controls="pass" aria-selected="false">Contraseña</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="info-liquidacion-tab" data-toggle="tab"
                                            href="#info-liquidacion" role="tab" aria-controls="info-liquidacion"
                                            aria-selected="false">Cuentas bancarias (liquidaciones)</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="tab-content" id="myTabContent">
                        <!--INFORMACIÓN PERSONAL-->
                        <div class="tab-pane fade show active" id="info-personal" role="tabpanel" aria-labelledby="info-personal-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--Card Información Básica-->
                                    <div class="card">
                                        <div
                                            class="card-header d-flex align-items-center justify-content-between bg-primary">
                                            <h5 class="mb-0 text-white">Datos personales</h5>
                                            <button type="button" class="btn btn-light btn-icon m-0 float-right"
                                                data-toggle="collapse" data-target=".info_basica" aria-expanded="false"
                                                aria-controls="info_basica-1 info_basica-2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Datos Personales-->
                                        <div class="card-body info_basica collapse show" id="info_basica-1">
                                            <div class="form-row">
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Rut</label>
                                                    <div>{{ $profesional->rut }}</div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Nombres</label>
                                                    <div>{{ $profesional->nombre }} </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Primer Apellido</label>
                                                    <div>{{ $profesional->apellido_uno }}</div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Segundo Apellido</label>
                                                    <div>{{ $profesional->apellido_dos }}</div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Sexo</label>
                                                    <div>
                                                        @if ($profesional->sexo == 'M')
                                                            Masculino
                                                        @elseif ($profesional->sexo == 'F')
                                                            Femenino
                                                        @else
                                                            Otro
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Profesión</label>
                                                    <div>{{ $txt_especialidades }}</div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Especialidad</label>
                                                    <div>{{ $txt_tipo_especialidades }}</div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Sub Especialidad</label>
                                                    <div>{{ $txt_sub_tipo_especialidades }}</div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Número de colegio</label>
                                                    <div>{{ $profesional->num_colegio }}</div>
                                                </div>
                                                <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <label class="font-weight-bolder ml-0 mb-0">Tipo de atención</label>
                                                    <div>
                                                        @if ($profesional->id_tipo_atencion)
                                                            @switch($profesional->id_tipo_atencion)
                                                                @case(1)
                                                                    Adultos / Niños
                                                                @break

                                                                @case(2)
                                                                    Niños
                                                                @break

                                                                @case(3)
                                                                    Adultos
                                                                @break

                                                                @case(4)
                                                                    Atención Domiciliaria
                                                                @break

                                                                @default
                                                                    Adultos / Niños
                                                            @endswitch
                                                        @else
                                                            Adultos / Niños
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Cierre: Datos Personales-->
                                        <!--(Editar)Datos Personales-->
                                        <div class="card-body info_basica collapse" id="pinfo_basica_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Rut</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="{{ $profesional->rut }}" name="editar_rut"
                                                            value="editar_rut">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Nombres</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="{{ $profesional->nombre }}" name="editar_nombres"
                                                            id="editar_nombres">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Primer Apellido</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="{{ $profesional->apellido_uno }}"
                                                            name="editar_apellido_uno" id="editar_apellido_uno">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Segundo Apellido</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="{{ $profesional->apellido_dos }}"
                                                            name="editar_apellido_dos" id="editar_apellido_dos">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Sexo</label>
                                                        <select class="form-control form-control-sm" id="editar_sexo"
                                                            name="editar_sexo">
                                                            <option>Seleccione</option>
                                                            <option value="M"
                                                                @if ($profesional->sexo == 'M') selected @endif>Masculino
                                                            </option>
                                                            <option value="F"
                                                                @if ($profesional->sexo == 'F') selected @endif>Femenino
                                                            </option>
                                                            <!--<option value="O" @if ($profesional->sexo == 'O') selected @endif>Otro
                                                            </option>-->
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Profesión</label>
                                                        <select class="form-control form-control-sm" id="id_especialidad"
                                                            name="id_especialidad"
                                                            onchange="carga_tipo_especialidad('id_especialidad', 'id_tipo_especialidad', '');">
                                                            <option>Seleccione</option>
                                                            @foreach ($especialidades as $especialidad)
                                                                @if ($especialidad->id == $profesional->id_especialidad)
                                                                    <option value="{{ $especialidad->id }}" selected>
                                                                        {{ $especialidad->nombre }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $especialidad->id }}">
                                                                        {{ $especialidad->nombre }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Especialidad</label>
                                                        <select class="form-control form-control-sm"
                                                            id="id_tipo_especialidad" name="id_tipo_especialidad"
                                                            onchange="carga_sub_tipo_especialidad('id_tipo_especialidad', 'id_sub_tipo_especialidad', '');">
                                                            <option>Seleccione</option>
                                                            @foreach ($tipo_especialidades as $tipo)
                                                                @if ($tipo->id == $profesional->id_tipo_especialidad)
                                                                    <option value="{{ $tipo->id }}" selected>
                                                                        {{ $tipo->nombre }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $especialidad->id }}">
                                                                        {{ $tipo->nombre }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Sub Especialidad</label>
                                                        <select class="form-control form-control-sm"
                                                            id="id_sub_tipo_especialidad" name="id_sub_tipo_especialidad">
                                                            <option value="">Seleccione</option>
                                                            @foreach ($sub_tipo_especialidades as $sub_tipo)
                                                                @if ($sub_tipo->id == $profesional->id_sub_tipo_especialidad)
                                                                    <option value="{{ $sub_tipo->id }}" selected>
                                                                        {{ $sub_tipo->nombre }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $sub_tipo->id }}">
                                                                        {{ $sub_tipo->nombre }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Número de colegio</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="editar_numero_colegio" name="editar_numero_colegio"
                                                            value="{{ $profesional->num_colegio }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Tipo de atención</label>
                                                        <select class="form-control form-control-sm"
                                                            id="id_tipo_atencion">
                                                            @if ($profesional->id_tipo_atencion)
                                                                @switch($profesional->id_tipo_atencion)
                                                                    @case(1)
                                                                        <option value="1" selected>Adultos / Niños</option>
                                                                        <option value="2">Niños</option>
                                                                        <option value="3">Adultos</option>
                                                                        <option value="4">Atención Domiciliaria</option>
                                                                    @break

                                                                    @case(2)
                                                                        <option value="1">Adultos / Niños</option>
                                                                        <option value="2" selected>Niños</option>
                                                                        <option value="3">Adultos</option>
                                                                        <option value="4">Atención Domiciliaria</option>
                                                                    @break

                                                                    @case(3)
                                                                        <option value="1">Adultos / Niños</option>
                                                                        <option value="2" selected>Niños</option>
                                                                        <option value="3">Adultos</option>
                                                                        <option value="4">Atención Domiciliaria</option>
                                                                    @break

                                                                    @case(4)
                                                                        <option value="1">Adultos / Niños</option>
                                                                        <option value="2">Niños</option>
                                                                        <option value="3">Adultos</option>
                                                                        <option value="4" selected>Atención Domiciliaria
                                                                        </option>
                                                                    @break

                                                                    @default
                                                                        <option value="1" selected>Adultos / Niños</option>
                                                                        <option value="2">Niños</option>
                                                                        <option value="3">Adultos</option>
                                                                        <option value="4">Atención Domiciliaria</option>
                                                                @endswitch
                                                            @else
                                                                <option value="1" selected>Adultos / Niños</option>
                                                                <option value="2">Niños</option>
                                                                <option value="3">Adultos</option>
                                                                <option value="4">Atención Domiciliaria</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <label class="col-sm-12 col-form-label"></label>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-danger btn-sm mr-2"><i
                                                                class="feather icon-x"></i> Cancelar</button>
                                                        <button type="button"
                                                            onclick="editar_profesional_datos_personales({{ $profesional->id }});"
                                                            class="btn btn-info btn-sm"><i class="feather icon-save"></i>
                                                            Guardar cambios </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: (Editar)Datos Personales-->
                                    </div>
                                    <!--Cierre: Card Datos Personales-->
                                </div>
                                <div class="col-md-6">
                                    <!--Card Contacto-->
                                    <div class="card">
                                        <div
                                            class="card-header d-flex align-items-center justify-content-between bg-primary">
                                            <h5 class="mb-0 text-white">Contacto</h5>
                                            <button type="button" class="btn btn-light btn-icon m-0 float-right"
                                                data-toggle="collapse" data-target=".info_contacto" aria-expanded="false"
                                                aria-controls="info_contacto_1 info_contacto_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Contacto-->
                                        <div class="card-body info_contacto collapse show" id="info_contacto_1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Correo
                                                            electrónico</label>
                                                        <div>{{ $profesional->email }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Teléfono</label>
                                                        <div>{{ $profesional->telefono_uno }}</div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Contacto-->
                                        <!--(Editar) Contacto-->
                                        <div class="card-body info_contacto collapse " id="info_contacto_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Correo electrónico</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="{{ $profesional->email }}" id="editar_email"
                                                            name="editar_email">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Teléfono</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            value="{{ $profesional->telefono_uno }}"
                                                            name="editar_telefono_uno" id="editar_telefono_uno">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-danger btn-sm mr-2"><i
                                                                class="feather icon-x"></i> Cancelar</button>
                                                        <button type="button"
                                                            onclick="editar_datos_contacto_profesional();"
                                                            class="btn btn-info btn-sm"><i class="feather icon-save"></i>
                                                            Guardar cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--(Editar) Contacto-->
                                    </div>
                                    <!--Cierre: Card Contacto-->
                                    <!--Card Residencia-->
                                    <div class="card">
                                        <div
                                            class="card-header d-flex align-items-center justify-content-between bg-primary">
                                            <h5 class="mb-0 text-white">Residencia</h5>
                                            <button type="button" class="btn btn-light btn-icon m-0 float-right"
                                                data-toggle="collapse" data-target=".info_residencial"
                                                aria-expanded="false"
                                                aria-controls="info_residencial_1 info_residencial_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Residencia-->
                                        <div class="card-body info_residencial collapse show" id="info_residencial_1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Región</label>
                                                        <div>{{ $direccion_txt_region_profesional }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Comuna</label>
                                                        <div>{{ $direccion_txt_ciudad_profesional }}</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="font-weight-bolder ml-0 mb-0">Dirección</label>
                                                        <div>
                                                            {{ $profesional->Direccion()->first()->direccion . ' ' . $profesional->Direccion()->first()->numero_dir }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Residencia-->
                                        <!--(Editar) Residencia-->
                                        <div class="card-body info_residencial collapse" id="info_residencial_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Región</label>
                                                        <select class="form-control form-control-sm"
                                                            onchange="buscar_ciudad_perfil();" id="perfil_region"
                                                            name="perfil_region">
                                                            <option value="">Seleccione una Región</option>
                                                            @if (isset($regiones))
                                                                @foreach ($regiones as $region)
                                                                    <option value="{{ $region->id }}"
                                                                        @if ($region->id == $profesional->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                        {{ $region->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Ciudad
                                                            {{ $direccion_id_ciudad_profesional }}</label>
                                                        <select class="form-control form-control-sm" id="perfil_ciudad"
                                                            name="perfil_ciudad">
                                                            <option value="">Seleccione su comuna </option>
                                                            @if (isset($ciudades))
                                                                @foreach ($ciudades as $ciudad)
                                                                    <option value="{{ $ciudad->id }}"
                                                                        @if ($direccion_id_ciudad_profesional == $ciudad->id) selected @endif>
                                                                        {{ $ciudad->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                        <label class="floating-label-activo">Dirección</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Dirección" name="perfil_dire" id="perfil_dire"
                                                            value="{{ $profesional->Direccion()->first()->direccion }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="floating-label-activo">Nº</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="n&uacute;mero #" name="perfil_numero_dir"
                                                            id="perfil_numero_dir"
                                                            value="{{ $profesional->Direccion()->first()->numero_dir }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div
                                                        class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-sm btn-danger mr-2"><i
                                                                class="feather icon-x"></i> Cancelar</button>
                                                        <button type="button" class="btn btn-sm btn-info"
                                                            onclick="editar_datos_residencia_profesional()"><i
                                                                class="feather icon-save"></i> Guardar cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--(Editar) Residencia-->
                                    </div>
                                    <!--Cierre: Card Residencia-->
                                </div>
                            </div>
                        </div>

                        <!--CONTRASEÑA-->
                        <div class="tab-pane fade" id="pass" role="tabpanel" aria-labelledby="pass-tab">
                            @include('app.general.perfil.cambio_contrasena')
                        </div>

                        <!--ANTECEDENTES ACADÉMICOS-->
                        <div class="tab-pane fade" id="info-academico" role="tabpanel"
                            aria-labelledby="info-academico-tab">
                            {{-- formulario para agregar  --}}
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h5 class="f-20 d-inline mr-2 pt-1">Antecedentes acedémicos</h5>
                                    <button type="button" class="btn btn-info btn-sm d-inline float-right mb-2"
                                        onclick="info_academica_m();"><i class="fas fa-plus"></i> Añadir</button>
                                </div>
                            </div>
                            <div class="row">
                                @if ($perfil_academico != null)
                                    @foreach ($perfil_academico as $key_academico => $value_academico)
                                        {{-- CAJA DE REGISTRO ACADEMICO  --}}
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <!--Card profesion-->
                                            <div class="card">
                                                <div
                                                    class="card-header d-flex align-items-center justify-content-between bg-primary">
                                                    <h5 class="mb-0 text-white">
                                                        {{ $value_academico->TipoAntecedenteAcademico->nombre }}</h5>
                                                    <div class="float-md-right d-inline">
                                                        <button type="button" class="btn btn-light btn-icon "
                                                            data-toggle="collapse"
                                                            data-target=".u_personal_{{ $value_academico->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="u_personal_{{ $value_academico->id }}_1 u_personal_{{ $value_academico->id }}_2">
                                                            <i class="feather icon-edit"></i>
                                                        </button>
                                                        <!--BOTÓN ELIMINAR PROGRAMAR - BORRAR COMENTARIO CUANDO SE PROGRAME-->
                                                        <button type="button" class="btn btn-light btn-icon"
                                                            onclick="eliminar_info_academica({{ $value_academico->id }});">
                                                            <i class="feather icon-x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--PROFESIÓN-->
                                                <div class="card-body  u_personal_{{ $value_academico->id }} collapse show"
                                                    id="u_personal_{{ $value_academico->id }}_1">
                                                    <form>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label
                                                                    class="font-weight-bolder ml-0 mb-0">Profesión</label>
                                                                <div> {{ $value_academico->nombre }}</div>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label
                                                                    class="font-weight-bolder ml-0 mb-0">Universidad</label>
                                                                <div> {{ $value_academico->universidad }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="font-weight-bolder ml-0 mb-0">Año de
                                                                    Título</label>
                                                                <div> {{ $value_academico->anio }}</div>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="font-weight-bolder ml-0 mb-0">Ciudad y
                                                                    País</label>
                                                                <div> {{ $value_academico->ciudad_pais }}</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="font-weight-bolder ml-0 mb-0">N°
                                                                    SUPERSALUD</label>
                                                                <div> {{ $value_academico->supersalud }}</div>
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                <label class="font-weight-bolder ml-0 mb-0">N° Colegio
                                                                    Profesional</label>
                                                                <div> {{ $value_academico->numero_colegio }}</div>
                                                            </div>
                                                        </div>
                                                        <!--<div class="form-group row">
                                                            <label class="col-sm-5 col-form-label">Profesion</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->nombre }}</div>
                                                            <label class="col-sm-5 col-form-label">Universidad</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->universidad }}</div>
                                                            <label class="col-sm-5 col-form-label">Año de Titulo</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->anio }}</div>
                                                            <label class="col-sm-5 col-form-label">Ciudad y País</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->ciudad_pais }}</div>
                                                            <label class="col-sm-5 col-form-label">N° SUPERSALUD</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->supersalud }}</div>
                                                            <label class="col-sm-5 col-form-label">N° Colegio Profesional</label>
                                                            <div class="col-sm-6 pt-2 ml-2 font-weight-bolder"> {{ $value_academico->numero_colegio }}</div>
                                                        </div>-->
                                                    </form>
                                                </div>

                                                <!--(Editar)profesion-->
                                                <div class="card-body u_personal_{{ $value_academico->id }} collapse"
                                                    id="u_personal_{{ $value_academico->id }}_2">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Profesión</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="{{ $value_academico->id }}_profesion"
                                                                value="{{ $value_academico->nombre }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Universidad</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="{{ $value_academico->id }}_universidad"
                                                                value="{{ $value_academico->universidad }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Año de Título</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="{{ $value_academico->id }}_anio"
                                                                value="{{ $value_academico->anio }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">Ciudad y País</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="{{ $value_academico->id }}_ciudad_pais"
                                                                value="{{ $value_academico->ciudad_pais }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">N° SUPERSALUD</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="{{ $value_academico->id }}_supersalud"
                                                                value="{{ $value_academico->supersalud }}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label class="floating-label-activo-sm">N° Colegio
                                                                Profesional</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                id="{{ $value_academico->id }}_numero_colegio"
                                                                value="{{ $value_academico->numero_colegio }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <div data-toggle="collapse"
                                                                data-target=".u_personal_{{ $value_academico->id }}"
                                                                aria-expanded="false"
                                                                aria-controls="u_personal_{{ $value_academico->id }}_1 u_personal_{{ $value_academico->id }}_2"
                                                                class="btn btn-danger btn-sm mr-2"><i
                                                                    class="feather icon-x"></i> Cancelar</div>
                                                            <button class="btn btn-info btn-sm"
                                                                onclick="modificar_registro_academico('{{ $value_academico->id }}');"><i
                                                                    class="feather icon-save"></i> Guardar cambios</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Cierre: (Editar)profesion-->
                                            </div>
                                            <!--Cierre: Card profesion-->
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <!--Tab perfil persona liquidacion -->
                        @include('general.seccion_perfil.seccion_liquidacion')
                    </div>
                </div>
            </div>
        </div>
        <!--Cierre: Container Completo-->
        <!--MODALS-->
        @include('app.profesional.modales.info_academica')

    </div>

@endsection

@section('page-script')
    <script>
        function eliminar_info_academica(id)
        {
            let url = "{{ route('profesional.eliminar_antecedente_academico') }}";
            let token = CSRF_TOKEN;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                },
            })
            .done(function(data) {

                if (data.estado == 1) {

                    swal({
                        title: "Se Elimino antecedentes académicos",
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 1000);
                    // alert('se modifico antecedentes del paciente');
                    // location.reload();

                } else {
                    swal({
                        title: "Error al Eliminar los antecedentes académicos",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    // alert('Error al modificar los antecedentes');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        // Funciones para manejo de foto de perfil
        function cambiar_foto_perfil(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                
                // Validar tipo de archivo
                if (!file.type.startsWith('image/')) {
                    swal({
                        title: "Tipo de archivo no válido",
                        text: "Por favor, selecciona un archivo de imagen válido.",
                        icon: "error",
                        buttons: "Aceptar",
                    })
                    return;
                }
                
                // Validar tamaño (ejemplo: máximo 5MB)
                if (file.size > 5 * 1024 * 1024) {
                    swal({
                        title: "Archivo demasiado grande",
                        text: "El archivo es demasiado grande. El tamaño máximo es de 5MB.",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                    return;
                }
                
                // Mostrar preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-image').src = e.target.result;
                };
                reader.readAsDataURL(file);
                
                // Enviar al servidor
                subir_foto_perfil(file);
            }
        }
        
        function subir_foto_perfil(file) {
            const formData = new FormData();
            formData.append('foto_perfil', file);
            formData.append('_token', '{{ csrf_token() }}');
            
            $.ajax({
                url: '{{ route("profesional.actualizar.foto") }}', // Necesitas crear esta ruta
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.success) {
                        swal({
                            title: "Foto actualizada",
                            text: "Tu foto de perfil se ha actualizado correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                        });
                        
                        // Actualizar la imagen con la nueva URL si es necesario
                        if (response.foto_url) {
                            document.getElementById('profile-image').src = response.foto_url;
                        }
                    } else {
                        swal({
                            title: "Error",
                            text: response.message || 'Error al actualizar la foto',
                            icon: "error",
                            buttons: "Aceptar",
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error.responseText);
                    swal({
                        title: "Error",
                        text: "Error al subir la imagen. Inténtalo de nuevo.",
                        icon: "error",
                        buttons: "Aceptar",
                    });
                    
                    // Revertir la imagen si hay error
                    document.getElementById('profile-image').src = '{{ $profesional->foto_perfil ? asset("storage/" . $profesional->foto_perfil) : asset("images/iconos/usuario_profesional.svg") }}';
                }
            });
        }
        
        function eliminar_foto_perfil() {
            swal({
                title: "¿Eliminar foto de perfil?",
                text: "Esta acción no se puede deshacer",
                icon: "warning",
                buttons: ["Cancelar", "Eliminar"],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '{{ route("profesional.eliminar.foto") }}', // Necesitas crear esta ruta
                        method: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                swal({
                                    title: "Foto eliminada",
                                    text: "Tu foto de perfil se ha eliminado correctamente",
                                    icon: "success",
                                    buttons: "Aceptar",
                                });
                                document.getElementById('profile-image').src = '{{ asset("images/iconos/usuario_profesional.svg") }}';
                            } else {
                                swal({
                                    title: "Error",
                                    text: response.message || 'Error al eliminar la foto',
                                    icon: "error",
                                    buttons: "Aceptar",
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                            swal({
                                title: "Error",
                                text: "Error al eliminar la imagen. Inténtalo de nuevo.",
                                icon: "error",
                                buttons: "Aceptar",
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
