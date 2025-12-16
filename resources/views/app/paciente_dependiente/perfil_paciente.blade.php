@extends('template.paciente.template')
@section('content')
<!--Container Completo-->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="font-weight-bolder">Editar Perfil</h5>
                        </div>
                        <ul class="breadcrumb mb-4">
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('paciente.perfil') }}">Editar Perfil</a>
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
                                                <img class="img-radius img-fluid wid-100" src="{{ asset('images/iconos/usuario.svg') }}" alt="User image">
                                            </div>
                                            <div class="overlay">
                                                <span>Actualizar</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"><i class="feather icon-upload-cloud mr-2"></i>Cambiar foto de perfil</a>
                                        <a class="dropdown-item" href="#"><i class="feather icon-trash-2 mr-2"></i>Eliminar fotografía</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-md-2">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2 active" id="personal-tab" data-toggle="tab" href="#info_personal" role="tab" aria-controls="info_personal" aria-selected="true"><i class="feather icon-user mr-2"></i>InformaciónPersonal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="emergencia-tab" data-toggle="tab" href="#emergencia" role="tab" aria-controls="emergencia" aria-selected="false"><i class="feather icon-user-plus mr-2"></i>Contacto deEmergencia</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="datmedicos-tab" data-toggle="tab" href="#datmedicos" role="tab" aria-controls="datmedicos" aria-selected="false"><i class="feather icon-plus-circle mr-2"></i>DatosMédicos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="pass-tab" data-toggle="tab" href="#pass" role="tab" aria-controls="pass" aria-selected="false"><i class="feather icon-lock mr-2"></i>Cambiar Contraseñas</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="myTabContent">
                    <!--Tab Información Personal-->
                    <div class="tab-pane fade show active" id="info_personal" role="tabpanel" aria-labelledby="personal-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <!--Card Información Básica-->
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Datos Personales</h5>
                                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Datos Personales-->
                                    <div class="card-body border-top info_basica collapse show" id="info_basica-1">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                <div class="col-sm-6 my-auto ml-2"> {{ $paciente->rut }} </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                                <div class="col-sm-6 my-auto ml-2"> {{ $paciente->nombres }} </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Primer
                                                    Apellido</label>
                                                <div class="col-sm-6 my-auto ml-2"> {{ $paciente->apellido_uno }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Segundo
                                                    Apellido</label>
                                                <div class="col-sm-6 my-auto ml-2"> {{ $paciente->apellido_dos }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    @if ($paciente->sexo == 'F')
                                                        Mujer
                                                    @elseif ($paciente->sexo == 'M')
                                                        Hombre
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Previsión</label>
                                                <div class="col-sm-6 my-auto ml-2"> Fonasa </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Datos Personales-->
                                    <!--(Editar)Datos Personales-->
                                    <div class="card-body border-top info_basica collapse" id="pinfo_basica_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Rut" id="perfil_rut" name="perfil_rut" value="{{ $paciente->rut }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Nombre" id="perfil_nombre" name="perfil_nombre" value="{{ $paciente->nombres }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="perfil_apellido_uno" name="perfil_apellido_uno" placeholder="Primer Apellido" value="{{ $paciente->apellido_uno }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="perfil_apellido_dos" name="perfil_apellido_dos" placeholder="Segundo Apellido" value="{{ $paciente->apellido_dos }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                <div class="col-sm-7 my-auto">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="perfil_sexo" name="perfil_sexo" id="inlineRadio1" value="M" @if ($paciente->sexo == 'M') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" id="perfil_sexo" name="perfil_sexo" id="inlineRadio2" value="F" @if ($paciente->sexo == 'F') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control" id="perfil_nac" name="perfil_nac" value="{{ $paciente->fecha_nac }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Previsión</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="perfil_prevision" name="perfil_prevision">
                                                        <option value="">Seleccione su previsión</option>
                                                        @if (isset($previsiones))
                                                            @foreach ($previsiones as $prevision)
                                                            <option value="{{ $prevision->id }}" @if ($paciente->id_prevision == $prevision->id) selected @endif>
                                                                {{ $prevision->nombre }}
                                                            </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="button" onclick="editar_paciente_datos_personales();" class="btn btn-info">Guardar Cambios</button>
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
                                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Contacto</h5>
                                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Contacto-->
                                    <div class="card-body border-top info_contacto collapse show" id="info_contacto_1">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Correo
                                                    Electrónico</label>
                                                <div class="col-sm-6 my-auto ml-2"> {{ $paciente->email }} </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                <div class="col-sm-6 my-auto ml-2">{{ $paciente->telefono_uno }}</div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Contacto-->
                                    <!--(Editar) Contacto-->
                                    <div class="card-body border-top info_contacto collapse " id="info_contacto_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{ $paciente->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{ $paciente->telefono_uno }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="button" onclick="editar_paciente_datos_contacto()" class="btn btn-info">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--(Editar) Contacto-->
                                </div>
                                <!--Cierre: Card Contacto-->
                                <!--Card Residencia-->
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Residencia</h5>
                                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Residencia-->
                                    <div class="card-body border-top info_residencial collapse show" id="info_residencial_1">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ $paciente->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ $paciente->Direccion()->first()->Ciudad()->first()->nombre }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                <div class="col-sm-6 my-auto ml-2">
                                                    {{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Residencia-->
                                    <!--(Editar) Residencia-->
                                    <div class="card-body border-top info_residencial collapse " id="info_residencial_2">
                                        <form action="{{ ROUTE('paciente.perfil.editdirec') }}" method="GET">
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" onchange="buscar_ciudad();" id="perfil_region" name="perfil_region">
                                                        <option value="">Seleccione una Región</option>
                                                        @if (isset($regiones))
                                                            @foreach ($regiones as $region)
                                                            <option value="{{ $region->id }}" @if ($region->id ==
                                                                $paciente->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                {{ $region->nombre }}
                                                            </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Ciudad</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control" id="perfil_ciudad" name="perfil_ciudad">
                                                        <option value="">Seleccione su comuna</option>
                                                        @if (isset($ciudades))
                                                            @foreach ($ciudades as $ciudad)
                                                            <option value="{{ $ciudad->id }}" @if ($paciente->Direccion()->first()->id_ciudad) selected @endif>
                                                                {{ $ciudad->nombre }}
                                                            </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{ $paciente->Direccion()->first()->direccion }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">N&uacute;mero#</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{ $paciente->Direccion()->first()->numero_dir }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="button" onclick="editar_paciente_datos_residencia();" class="btn btn-info">Guardar Cambios</button>
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
                    <!--Cierre: Tab Información Personal-->

                    <!--Tab Contactos de Emergencia-->
                    <div class="tab-pane fade" id="emergencia" role="tabpanel" aria-labelledby="emergencia-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-danger">
                                        <h5 class="text-white d-inline float-left mt-1">Contactos de emergencia</h5>
                                        <button type="button" onclick="modal_agregar_contacto_emergencia();" class="btn btn-outline-light btn-sm d-inline float-right mr-4">
                                            <i class="feather icon-plus"></i> Agregar contacto
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="overflow-x:auto;">
                                                    <table id="contactos_emergencia" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">

                                                        @if ($contacto != null)
                                                            <thead>
                                                                <tr>
                                                                    <th class="align-middle text-center">Prioridad</th>
                                                                    <th class="align-middle text-center">Nombre</th>
                                                                    <th class="align-middle text-center">Parentesco
                                                                    </th>
                                                                    <th class="align-middle text-center">Acción</th>
                                                                </tr>
                                                            </thead>

                                                            @foreach ($contacto as $c)
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="align-middle text-center">
                                                                            {{ $c->prioridad }}
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            {{ $c->nombre }}
                                                                            <br>{{ $c->apellido_uno . ' ' . $c->apellido_dos }}
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            {{ $c->parentezco }}
                                                                        </td>
                                                                        <td class="align-middle text-center">

                                                                            <button id="btn_info_contacto" onclick="cargar_datos_contacto({{ $c->id }})" class="btn btn-info btn-sm rounded-circle" data-toggle="modal" data-target="#info_contacto_emergencia" title="Información de contacto" data-placement="top"><i class="feather icon-phone-call"></i>
                                                                            </button>

                                                                            <button id="btn_editar_contacto" onclick="cargar_datos_contacto({{ $c->id }})" class="btn btn-warning btn-sm rounded-circle" data-toggle="modal" data-target="#editar_contacto_emergencia" title="Editar contacto" data-placement="top"><i class="feather icon-edit"></i>
                                                                            </button>
                                                                            <button class="btn btn-danger btn-sm rounded-circle" onclick="eliminar_contacto_paciente({{ $c->id . ',' . $paciente->id }})" data-toggle="tooltip" title="Eliminar contacto"><i class="feather icon-x"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            @endforeach
                                                        @else
                                                            <tbody>
                                                                <tr>
                                                                    <td><span>NO EXISTEN REGISTROS</span></td>

                                                                </tr>
                                                            </tbody>
                                                        @endif
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab Contactos de Emergencia-->

                    <!--Tab Datos médicos  OJO   IDENTIFICAR AL PROFESIONAL RESPONSABLE Y PONER UN ALERT DICIENDO LO IMPORTANTE QUE ES EL LLENADO CORRECTO-->
                    <div class="tab-pane fade" id="datmedicos" role="tabpanel" aria-labelledby="datmedicos-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <!--Card Datos profesional-->
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
                                        <h5 class="mb-0 text-white">Datos del médico responsable del llenado y/o
                                            Actualización de datos </h5>

                                    </div>
                                    <!--Datos profesional-->
                                    <div class="card-body border-top info_basica_sos collapse show" id="info_basica_sos_1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Rut
                                                            del Profesional</label>
                                                        <div class="col-sm-7 my-auto ml-2">
                                                            @if (isset($profesional))
                                                            {{ $profesional->rut }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nombres
                                                            y Apellidos</label>
                                                        <div class="col-sm-7 my-auto ml-2">
                                                            @if (isset($profesional))
                                                            {{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Fecha
                                                            de Actualización</label>
                                                        <div class="col-sm-7 my-auto ml-2"> 12/01/2021 * </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Especialidad</label>
                                                        <div class="col-sm-7 my-auto ml-2">
                                                            @if (isset($profesional))
                                                            {{ $profesional->Especialidad()->first()->nombre }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: Datos profesional-->
                                    <!--(Editar)Datos profesional-->
                                    <div class="card-body border-top info_basica_sos collapse" id="info_basica_sos_2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Rut del
                                                        Profesional</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" placeholder="Rut Profesional " value="00000000-0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Fecha de
                                                        Actualización</label>
                                                    <!--hoy-->
                                                    <div class="col-sm-7">
                                                        <input type="date" class="form-control" placeholder="Fecha Actualización" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Nombres y
                                                        Apellidos</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" placeholder="Nombres y Apellidos" value="Luis Armando Sepulveda Vera">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Especialidad</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" placeholder="Especialidad" value="Medicina Interna">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label"></label>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-dark mr-2">Verificar
                                                            Profesional</button>
                                                        <!--Acá se verifican con la API Datos profesional si pasa se habilitan los otros formularios-->
                                                        <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                                        <!--OJO Guardar fecha y nombre del que actualiza  formularios-->
                                                        <button type="submit" class="btn btn-info">Guardar
                                                            Cambios</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: (Editar)Datos profesional-->

                                </div>
                                <!--Cierre: Card Datos profesional-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!--Card Datos Sangre Donación de Organos-->
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
                                        <h5 class="mb-0 text-white">Antecedentes I (Transfusiones y Donación de
                                            Órganos)</h5>
                                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial_sos" aria-expanded="false" aria-controls="info_residencial_sos_1 info_residencial_sos_2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Sangre Donación de Organo-->
                                    <div class="card-body border-top info_residencial_sos collapse show" id="info_residencial_sos_1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Acepta
                                                        Transfusión?</label>
                                                    <div class="col-sm-7 col-form-label">
                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->transfusion == 1)
                                                        SI
                                                        @else
                                                        NO
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Donante
                                                        de Sangre?</label>
                                                    <div class="col-sm-7 col-form-label">
                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos == 1)
                                                        SI
                                                        @else
                                                        NO
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Grupo
                                                        Sanguíneo</label>
                                                    <div class="col-sm-7 col-form-label text-danger">
                                                        @if ($paciente->Antecedentes()->first() != null)
                                                        @if ($paciente->Antecedentes()->first()->GrupoSanguineo()->first() != null)
                                                        {{ $paciente->Antecedentes()->first()->GrupoSanguineo()->first()->nombre_gs }}
                                                        @endif
                                                        @else
                                                        Sin registro
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Comentarios
                                                        de grupo sanguíneo</label>
                                                    <div class="col-sm-7 col-form-label">
                                                        @if ($paciente->Antecedentes()->first() != null)
                                                        @if ($paciente->Antecedentes()->first()->GrupoSanguineo()->first() != null)
                                                        {{ $paciente->Antecedentes()->first()->GrupoSanguineo()->first()->descripcion_gs }}
                                                        @endif
                                                        @else
                                                        Sin registro
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Vacuna o
                                                        Hepatitis</label>
                                                    <div class="col-sm-7 col-form-label text-danger">
                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->hepatitis == 1)
                                                        SI
                                                        @else
                                                        NO
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Comentarios</label>
                                                    <div class="col-sm-7 col-form-label">
                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentario_hepa != '')
                                                        {{ $paciente->Antecedentes()->first()->comentario_hepa }}
                                                        @else
                                                        Sin registro
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">
                                                        ¿Donante Total de Órganos?
                                                    </label>
                                                    <div class="col-sm-7 col-form-label">
                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos == 1)
                                                        SI
                                                        @else
                                                        NO
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">
                                                        ¿Donante Parcial de Órganos?
                                                    </label>
                                                    <div class="col-sm-7 col-form-label">
                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos == 2)
                                                        SI
                                                        @else
                                                        NO
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Órganos a
                                                        donar</label>
                                                    <div class="col-sm-7 col-form-label">No</div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">
                                                        Impedimento para donar
                                                    </label>
                                                    <div class="col-sm-7 col-form-label">
                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->impedimento_donar != '')
                                                        {{ $paciente->Antecedentes()->first()->impedimento_donar }}
                                                        @else
                                                        Sin Registros
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: Sangre Donación de Organo-->
                                    <!--(Editar) Sangre Donación de Organo-->
                                    <div class="card-body border-top info_residencial_sos collapse " id="info_residencial_sos_2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">
                                                        ¿Acepta Transfusión?
                                                    </label>
                                                    <div class="col-sm-7 my-auto">

                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->transfusion == 1)
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_transfusion" id="edit_transfusion" value="1" checked>
                                                            <label class="form-check-label" for="transfusion_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_transfusion" id="edit_transfusion" value="0">
                                                            <label class="form-check-label" for="transfusion_no">No</label>
                                                        </div>
                                                        @else
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_transfusion" id="edit_transfusion" value="1">
                                                            <label class="form-check-label" for="transfusion_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_transfusion" id="edit_transfusion" value="0" checked>
                                                            <label class="form-check-label" for="transfusion_no">No</label>
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Donante
                                                        de Sangre?</label>
                                                    <!--hoy-->

                                                    @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_sangre == 1)
                                                    <div class="col-sm-7 my-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_dona_sangre" id="edit_dona_sangre" value="1" checked>
                                                            <label class="form-check-label" for="dona_sangre_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_dona_sangre" id="edit_dona_sangre" value="0">
                                                            <label class="form-check-label" for="dona_sangre_no">No</label>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="col-sm-7 my-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_dona_sangre" id="edit_dona_sangre" value="1">
                                                            <label class="form-check-label" for="donante_sangre_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_dona_sangre" id="edit_dona_sangre" value="0" checked>
                                                            <label class="form-check-label" for="donante_sangre_no">No</label>
                                                        </div>
                                                    </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Grupo
                                                        Sanguíneo</label>
                                                    <div class="col-sm-7 my-auto">
                                                        <select name="editar_grupo_sanguineo" id="editar_grupo_sanguineo" class="form-control">
                                                            <option value="">Seleccione</option>

                                                            @if (isset($grupo_sanguineo) && $grupo_sanguineo != null && $grupo_sanguineo != '')
                                                            @foreach ($grupo_sanguineo as $gs)
                                                            @if (isset($paciente->Antecedentes()->first()->id_grupo_sanguineo) && $gs->id == $paciente->Antecedentes()->first()->id_grupo_sanguineo)
                                                            <option value="{{ $gs->id }}" selected>
                                                                {{ $gs->nombre_gs }}
                                                            </option>
                                                            @else
                                                            <option value="{{ $gs->id }}">
                                                                {{ $gs->nombre_gs }}
                                                            </option>
                                                            @endif
                                                            @endforeach
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Comentarios
                                                        de grupo sanguíneo</label>
                                                    <!--hoy-->
                                                    @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentario_gs != null)
                                                    <div class="col-sm-7">
                                                        <textarea id="comentarios_gruposangre" class="form-control" placeholder="Comentarios de grupo sanguíneo">{{ $paciente->Antecedentes()->first()->comentario_gs }}</textarea>
                                                    </div>
                                                    @else
                                                    <div class="col-sm-7">
                                                        <textarea id="comentarios_gruposangre" class="form-control" placeholder="Comentarios de grupo sanguíneo"></textarea>
                                                    </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Vacuna o
                                                        Hepatitis</label>
                                                    @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->hepatitis == 1)
                                                    <div class="col-sm-7 my-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_hepatitis" id="edit_hepatitis" value="1" checked>
                                                            <label class="form-check-label" for="edit_hepatitis_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_hepatitis" id="edit_hepatitis" value="0">
                                                            <label class="form-check-label" for="edit_hepatitis_no">No</label>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="col-sm-7 my-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_hepatitis" id="edit_hepatitis" value="1">
                                                            <label class="form-check-label" for="edit_hepatitis_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_hepatitis" id="edit_hepatitis" value="0" checked>
                                                            <label class="form-check-label" for="edit_hepatitis_no">No</label>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">
                                                        Comentarios
                                                    </label>
                                                    @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentario_hepa != null)
                                                    <div class="col-sm-7">
                                                        <textarea id="comentarios_hepatitis" class="form-control" placeholder="Comentarios de grupo sanguíneo">{{ $paciente->Antecedentes()->first()->comentario_hepa }}</textarea>
                                                    </div>
                                                    @else
                                                    <div class="col-sm-7">
                                                        <textarea id="comentarios_hepatitis" class="form-control" placeholder="Comentarios">
                                                                                                                                                                                                                                                                                                </textarea>
                                                    </div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Donante
                                                        Total de Órganos?</label>

                                                    @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos == 1)
                                                    <div class="col-sm-7 my-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="1" checked>
                                                            <label class="form-check-label" for="donante_total_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="0">
                                                            <label class="form-check-label" for="donante_total_no">No</label>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="col-sm-7 my-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="1">
                                                            <label class="form-check-label" for="donante_total_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="0" checked>
                                                            <label class="form-check-label" for="donante_total_no">No</label>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Donante
                                                        Parcial de Órganos?</label>

                                                    @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos == 1)
                                                    <div class="col-sm-7 my-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="1" checked>
                                                            <label class="form-check-label" for="donante_parcial_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="0">
                                                            <label class="form-check-label" for="donante_parcial_no">No</label>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="col-sm-7 my-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="1">
                                                            <label class="form-check-label" for="donante_parcial_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="0" checked>
                                                            <label class="form-check-label" for="donante_parcial_no">No</label>
                                                        </div>
                                                    </div>
                                                    @endif


                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">
                                                        Órganos a donar
                                                    </label>
                                                    <div class="col-sm-7">
                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentarios != null)
                                                        <textarea id="comentarios_organo" class="form-control" placeholder="Órganos a donar">
                                                        {{ $paciente->Antecedentes()->first()->comentarios }}
                                                        </textarea>
                                                        @else
                                                        <textarea id="comentarios_organo" class="form-control" placeholder="Órganos a donar"></textarea>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Impedimento
                                                        para donar</label>
                                                    <!--hoy-->


                                                    <div class="col-sm-7">
                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->impedimento_donar != null)
                                                        <textarea id="comentarios_impedimento" class="form-control" placeholder="Impedimento para donar">{{ $paciente->Antecedentes()->first()->impedimento_donar }}</textarea>
                                                        @else
                                                        <textarea id="comentarios_impedimento" class="form-control" placeholder="Impedimento para donar"></textarea>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row container-fluid">
                                            <div class="col-md-2">
                                                <div class="form-group row">
                                                    <button type="button" onclick="editar_antecedentes_paciente({{ $paciente->id }});" class="btn btn-primary">Guardar
                                                        Cambios</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--cierre(Editar) Sangre Donación de Organo-->
                                </div>
                                <!--Cierre: Datos Sangre Donación de Organos-->
                            </div>
                        </div>
                        @include( 'app.profesional.edicion_paciente.antecedentes_paciente_dos' )
                    </div>
                    <!--Cierre: Tab Tab Datos médicos-->
                    <!--Tab Cambiar Contraseñas-->
                    <div class="tab-pane fade" id="pass" role="tabpanel" aria-labelledby="pass-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <!--Card Datos Rompe Clave-->
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Romper clave</h5>
                                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".rompeclave" aria-expanded="false" aria-controls="rompeclave_1 rompeclave_2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Datos Rompe Clave-->
                                    <div class="card-body border-top rompeclave collapse show" id="rompeclave_1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">¿Autoriza
                                                            romper clave?</label>
                                                        <div class="col-sm-7 my-auto ml-2"> Si</div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">¿Autoriza
                                                            acceso a datos confidenciales?</label>
                                                        <div class="col-sm-7 my-auto ml-2"> Si </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: Datos Rompe Clave-->
                                    <!--(Editar)Datos Rompe Clave-->
                                    <div class="card-body border-top rompeclave collapse" id="rompeclave_2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Autoriza
                                                        romper clave?</label>
                                                    <div class="col-sm-7 my-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="rompeclave_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="rompeclave_no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">¿Autoriza
                                                        acceso a datos confidenciales?</label>
                                                    <!--hoy-->
                                                    <div class="col-sm-7 my-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                            <label class="form-check-label" for="datos_confidenciales_si">Si</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                            <label class="form-check-label" for="datos_confidenciales_no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger" role="alert">
                                                    <p class="text-justify">Este botón autoriza a Salud Digital
                                                        Integrada a entregar un rompe clave para que un
                                                        <strong>PROFESIONAL DE UN SERVICIO DE URGENCIAS</strong> acceda
                                                        a su Ficha Médica Única en el caso de que usted esé inconsciente
                                                        o no este en condiciones de permitirlo personalmente. Tenga en
                                                        cuenta que el acceder a sus datos médicos puede contribuir a
                                                        salvar su vida o recuperar valiosos minutos que ayudarán en lo
                                                        posible a disminuir las secuelas de una
                                                        <strong>URGENCIA</strong>.
                                                    <p>

                                                    <p class="text-center">En el caso de que esta acción sea
                                                        requerida una vez pasada la urgencia <br><strong>SALUD
                                                            DIGITAL INTEGRADA RECOMIENDA CAMBIAR SUS CLAVES DE
                                                            ACCESO</strong>.
                                                    <p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: (Editar) Rompe Clave-->
                                </div>
                                <!--Cierre: Card Rompe Clave-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <!--Card Contraseña Personal-->
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                        <h5 class="mb-0 text-white">Cambie su Contraseña Personal</h5>
                                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pass_personal" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Contraseña Personal-->
                                    <div class="card-body border-top pass_personal collapse show" id="pass_personal_1">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Contraseña
                                                    Actual</label>
                                                <div class="col-sm-6 pt-2 ml-2"> •••••••• </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Contraseña Personal-->
                                    <!--(Editar)Contraseña Personal-->
                                    <div class="card-body border-top pass_personal collapse" id="pass_personal_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Contraseña
                                                    Actual</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Contraseña Actual">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Nueva
                                                    Contraseña</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Nueva Contraseña">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Repita su
                                                    Contraseña</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Repita la Contraseña">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="submit" class="btn btn-info">Guardar
                                                        Cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: (Editar)Contraseña Personal-->
                                </div>
                                <!--Cierre: Card Contraseña Personal-->
                            </div>
                            <div class="col-md-6">
                                <!--Card Contraseña Confidencial-->
                                <div class="card">
                                    <div class="card-body d-flex align-items-center justify-content-between bg-danger">
                                        <h5 class="mb-0 text-white">Cambie su Contraseña Confidencial</h5>
                                        <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".pass_confidencial" aria-expanded="false" aria-controls="pass_confidencial_1 pass_confidencial_2">
                                            <i class="feather icon-edit"></i>
                                        </button>
                                    </div>
                                    <!--Contraseña Confidencial-->
                                    <div class="card-body border-top pass_confidencial collapse show" id="pass_confidencial_1">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Contraseña
                                                    Actual</label>
                                                <div class="col-sm-6 pt-2 ml-2"> •••••••• </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Contraseña Confidencial-->
                                    <!--(Editar)Contraseña Confidencial-->
                                    <div class="card-body border-top pass_confidencial collapse" id="pass_confidencial_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Contraseña
                                                    Actual</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Contraseña Actual">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Nueva
                                                    Contraseña</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Nueva Contraseña">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-5 col-form-label font-weight-bolder">Repita su
                                                    Contraseña</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" placeholder="Repita la Contraseña">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="submit" class="btn btn-info">Guardar
                                                        Cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: (Editar)Contraseña Confidencial-->
                                </div>
                                <!--Cierre: Card Contraseña Confidencial-->
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Tab Cambiar Contraseñas-->
                    <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include( 'app.paciente.modales.contacto_emergencia.agregar_contacto_emergencia' )
@include( 'app.paciente.modales.contacto_emergencia.informacion_contacto_emergencia' )
@include( 'app.paciente.modales.contacto_emergencia.editar_contacto_emergencia' )


<!--Cierre: Container Completo-->
@endsection
@section('page-script')
<!-- ekko-lightbox Js -->
<script src="{{ asset('js/plugins/ekko-lightbox.min.js') }}"></script>
<script src="{{ asset('js/plugins/lightbox.min.js') }}"></script>
<script src="{{ asset('js/pages/ac-lightbox.js') }}"></script>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // [ customer-scroll ] start
    // var px = new PerfectScrollbar('.cust-scroll', {
    //     wheelSpeed: .5,
    //     swipeEasing: 0,
    //     wheelPropagation: 1,
    //     minScrollbarLength: 40,
    // });
    // [ customer-scroll ] end

    $(document).ready(function () {

            /* formatear rut */
            $("#rut_nuevo_contacto").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

        });

    function buscar_contacto() {


        $('#nombres_contacto_emergencia').val();
        $('#apellido_uno_contacto_emergencia').val();
        $('#apellido_dos_contacto_emergencia').val();
        $('#email_contacto_emergencia').val();
        $('#telefono_contacto_emergencia').val();
        $('#direccion_contacto_emergencia').val();
        $('#numero_dir_contacto_emergencia').val();
        $('#fecha_nac_contacto_emergencia').val();

        let rut_contacto = $('#rut_nuevo_contacto').val();
        let id_paciente_contacto = $('#id_paciente').val();
        let url = "{{ route('contacto_emergencia.buscar_contacto') }}"

        $.ajax({

                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    rut_contacto: rut_contacto,
                    id_paciente_contacto: id_paciente_contacto,
                },
            })
            .done(function(data) {

                if (data == 'identicos') {
                    swal({
                        title: "No puede ser registrado el rut del paciente como contacto",
                        icon: "error",
                        buttons: "Aceptar",
                        dangerMode: true,
                    });

                    $('#rut_nuevo_contacto').val('');
                    $('#nombres_contacto_emergencia').val('');
                    $('#apellido_uno_contacto_emergencia').val('');
                    $('#apellido_dos_contacto_emergencia').val('');
                    $('#fecha_nac_contacto_emergencia').val('');
                    $('#direccion_contacto_emergencia').val('');
                    $('#ciudad_agregar').val('');
                    $('#region_agregar').val('');
                    $('#email_contacto_emergencia').val('');
                    $('#telefono_contacto_emergencia').val('');
                    $('#parentezco_contacto_emergencia').val('0');
                    $('#prioridad_contacto_emergencia').val('');
                }

                if (data !== 'vacio') {

                    if (data == 'existe') {

                        swal({
                            title: "Ya Existe el contacto emergencia en su lista",
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                        // alert('Contacto Emergencia ya esta agregado a su lista');
                        $('#rut_nuevo_contacto').val('');

                    } else {

                        data = JSON.parse(data);

                        for (let i = 0; i < data.region.length; i++) {

                            if (data.region[i].id == data.ciudad.id_region) {

                                $('#region_agregar').val(data.region[i].id);
                                buscar_ciudades();

                            }
                        }
                        // alert(data.ciudad.id);
                        // console.log(data.ciudad.id);
                        $('#ciudad_agregar').val(data.ciudad.id);
                        //console.log(data)
                        /* alert('Asistente encontrado en el sistema, valide datos para registrar');
                         $('#id_asistente_registrado').val(data.id);
                         $('#buscar_datos_asistente').hide();

                         $('#inputs_nuevo_asistente').show();*/
                        $('#form_contacto_nuevo').show();
                        $('#nombres_contacto_emergencia').val(data.nombres);
                        $('#apellido_uno_contacto_emergencia').val(data.apellido_uno);
                        $('#apellido_dos_contacto_emergencia').val(data.apellido_dos);
                        $('#email_contacto_emergencia').val(data.email);
                        $('#telefono_contacto_emergencia').val(data.telefono_uno);
                        $('#direccion_contacto_emergencia').val(data.direccion);
                        $('#numero_dir_contacto_emergencia').val(data.numero_dir);
                        $('#fecha_nac_contacto_emergencia').val(data.fecha_nac);
                        let ciudad = data.ciudad.id;
                        // console.log(ciudad + ' entro a ciudad');

                        // $('#ciudad_agregar option[value="' + ciudad + '"]"').attr("selected", true);

                        // console.log(data.ciudad.id);
                    }

                } else {


                    swal({
                        title: "Rut no encontrado en el sistema, complete registro",
                        icon: "warning",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })

                    // alert('Rut no encontrado en el sistema, complete registro');
                    $('#form_contacto_nuevo').show();

                }


            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });



    }

    function cerrar_agregar_contacto_emergencia() {
        $('#agregar_contacto_emergencia').modal('hide');
        $('#form_contacto_nuevo').hide();
        $("#rut_nuevo_contacto").val('');
    }


    function registrar_contacto_emergencia() {

        let id_paciente = $('#id_paciente').val();
        let url = "{{ route('contacto_emergencia.registrar_contacto_emergencia') }}";

        let rut = $('#rut_nuevo_contacto').val();
        let nombres = $('#nombres_contacto_emergencia').val();
        let apellido_uno = $('#apellido_uno_contacto_emergencia').val();
        let apellido_dos = $('#apellido_dos_contacto_emergencia').val();
        let fecha = $('#fecha_nac_contacto_emergencia').val();
        let direccion = $('#direccion_contacto_emergencia').val();
        let id_ciudad = $('#ciudad_agregar').val();
        let email = $('#email_contacto_emergencia').val();
        let telefono = $('#telefono_contacto_emergencia').val();
        let parentezco = $('#parentezco_contacto_emergencia').val();
        let prioridad = $('#prioridad_contacto_emergencia').val();

        // let direccion = $('#direccion_contacto_emergencia').val();
        let numero_dir = $('#numero_dir_contacto_emergencia').val();
        //let ciudad_agregar = $('#ciudad_agregar').val();


        $.ajax({

                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    id_paciente: id_paciente,
                    rut: rut,
                    nombres: nombres,
                    apellido_uno: apellido_uno,
                    apellido_dos: apellido_dos,
                    fecha: fecha,
                    direccion: direccion,
                    numero_dir: numero_dir,
                    id_ciudad: id_ciudad,
                    email: email,
                    telefono: telefono,
                    parentezco: parentezco,
                    prioridad: prioridad

                },
            })
            .done(function(data) {



                if (data != null) {
                    data = JSON.parse(data);
                    // console.log(data);

                    $('#agregar_contacto_emergencia').modal('hide');

                    swal({
                        title: "Se Registro Contacto de emergencia de forma correcta",
                        icon: "success",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                    // Swal.clickConfirm();
                    setTimeout(function() {
                        location.reload()
                    }, 3000);
                    // $('#mensaje_ditar_perfil').text(
                    //     'Se Registro Contacto de emergencia de forma correcta');


                } else {
                    swal({
                        title: "No se pudo registrar al contacto de emergencia",
                        icon: "error",
                        buttons: "Aceptar",
                        dangerMode: true,
                    });

                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    };


    function cargar_datos_contacto(id) {
        let id_contacto = id;
        url = "{{ route('profesional.cargar_datos_contacto') }}";
        $.ajax({
                url: url,
                type: "get",
                data: {
                    id_contacto: id_contacto,

                }

            })
            .done(function(data) {

                console.log('------------------------------------');
                console.log(data);
                console.log('------------------------------------');
                if (data != null) {

                    $('#ver_rut_contacto').text(data.rut);
                    $('#ver_nombre_contacto').text(data.nombre + ' ' + data.apellido_uno + ' ' + data
                        .apellido_dos);
                    $('#ver_telefono_contacto').text(data.telefono);
                    $('#ver_direccion_contacto').text(data.direccion.direccion + ' ' +
                        data.direccion.numero_dir + ' Región de ' + data.region.nombre + ', ' + data.ciudad.nombre);
                    //$('#info_contacto_emergencia').modal('show');
                    $('#ver_email_contacto').text(data.email);

                    $('#id_contacto').val(data.id);
                    $('#rut_contacto').val(data.rut);

                    $('#nombres_contacto').val(data.nombre);


                    $('#apellido_uno_contacto').val(data.apellido_uno);

                    $('#apellido_dos_contacto').val(data.apellido_dos);

                    $('#telefono_contacto').val(data.telefono);

                    $('#direccion_contacto').val(data.direccion.direccion);

                    $('#numero_dir_contacto').val(data.direccion.numero_dir);


                    $('#region_contacto_modificar').val(data.region.id);
                    buscar_ciudades_mod(data.ciudad.id);
                    $("#ciudad_contacto_modificar[value=" + data.ciudad.id + "]").attr("selected", true);
                    //$('#ciudad_contacto_modificar').text(data.ciudad.nombre);


                    //$('#info_contacto_emergencia').modal('show');
                    $('#email_contacto').val(data.email);

                    $('#parentezco_contacto').val(data.parentezco);

                    $('#prioridad_contacto').val(data.prioridad);



                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function eliminar_contacto_paciente(contacto, paciente) {


        let id_contacto = contacto;
        let id_paciente = paciente

        let url = "{{ route('profesional.eliminar_contacto_paciente') }}";

        $.ajax({
                url: url,
                type: "get",
                data: {
                    id_contacto: id_contacto,
                    id_paciente: id_paciente
                }

            })
            .done(function(data) {
                if (data != 'error') {
                    swal({
                        title: "Contacto eliminado de forma exitosa",
                        icon: "success",
                        buttons: "Aceptar",
                        // DangerMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 4000);


                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    };

    function editar_paciente_datos_personales() {

        // let id_paciente = id;
        // let rut = $('#editar_rut').val();
        let perfil_nombre = $('#perfil_nombre').val();
        let perfil_apellido_uno = $('#perfil_apellido_uno').val();
        let perfil_apellido_dos = $('#perfil_apellido_dos').val();
        let perfil_sexo = $('#perfil_sexo').val();
        let perfil_nac = $('#perfil_nac').val();
        let perfil_prevision = $('#perfil_prevision').val();
        let url = "{{ route('paciente.perfil.editinfo') }}";

        $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: CSRF_TOKEN,
                    // id_paciente: id_paciente,
                    perfil_nombre: perfil_nombre,
                    perfil_apellido_uno: perfil_apellido_uno,
                    perfil_apellido_dos: perfil_apellido_dos,
                    perfil_sexo: perfil_sexo,
                    perfil_nac: perfil_nac,
                    perfil_prevision: perfil_prevision,


                },
            })
            .done(function(response) {

                if (response.success) {
                    swal({
                        title: "Datos del Paciente editados correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 4000);


                } else {
                    swal({
                        title: "Error al Editar los datos del paciente",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 3000);

                }


            })
            .fail(function() {
                console.log("error");
            })

    };

    function editar_paciente_datos_residencia() {

        // let id_paciente = id;
        let perfil_dire = $('#perfil_dire').val();
        let perfil_region = $('#perfil_region').val();
        let perfil_ciudad = $('#perfil_ciudad').val();
        let perfil_numero_dir = $('#perfil_numero_dir').val();

        let url = "{{ ROUTE('paciente.perfil.editdirec') }}";

        $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: CSRF_TOKEN,
                    // id_paciente: id_paciente,
                    perfil_dire: perfil_dire,
                    perfil_region: perfil_region,
                    perfil_ciudad: perfil_ciudad,
                    perfil_numero_dir: perfil_numero_dir,

                },
            })
            .done(function(response) {

                if (response.success) {
                    swal({
                        title: "Sus datos de residencia fueron editados de forma correcta",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 4000);


                } else {
                    swal({
                        title: "Error al editar sus datos de residencia",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 3000);

                }


            })
            .fail(function() {
                console.log("error");
            })

    };

    function editar_paciente_datos_contacto() {

        // let id_paciente = id;
        // let rut = $('#editar_rut').val();
        let perfil_email = $('#Perfil_email').val();
        let perfil_fono = $('#Perfil_fono').val();

        let url = "{{ ROUTE('paciente.perfil.editcontacto') }}";

        $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: CSRF_TOKEN,
                    // id_paciente: id_paciente,
                    perfil_email: perfil_email,
                    perfil_fono: perfil_fono,


                },
            })
            .done(function(response) {

                if (response.success) {
                    swal({
                        title: "Sus datos de contacto fueron editados de forma correcta",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 4000);


                } else {
                    swal({
                        title: "Error al editar sus datos de contacto",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 3000);

                }


            })
            .fail(function() {
                console.log("error");
            })

    };

    function agregar_alergia_paciente(id_paciente) {

        let alergia = $('#alergia_paciente').val();
        let paciente = id_paciente;
        let token = CSRF_TOKEN;

        let url = "{{ route('profesional.agregar_alergia_paciente') }}";

        $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: CSRF_TOKEN,
                    alergia: alergia,
                    paciente: paciente
                },
            })
            .done(function(response) {

                if (response.success) {
                    swal({
                        title: "Alergia agregada correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                    $('#alergia_paciente').val('');

                    $('#table_alergias_paciente tbody').empty();
                    for (i = 0; i < response.alergias.length; i++) {

                        // var fecha = formatDate(data[i].created_at);
                        //var salida = formato(fecha);
                        var nombre_alergia = response.alergias[i].nombre_alergia;
                        // var tipo = data[i].tipo_examen;
                        // var prioridad = data[i].id_prioridad;

                        var j = 1; //contador para asignar id al boton que borrara la fila
                        var fila = '<tr class="tr_alergias_paciente" id="row' + j + '"><td>' +
                            nombre_alergia + '</td><td>' +
                            'botones' +
                            '</td></tr>'; //esto seria lo que contendria la fila

                        j++;

                        $('#table_alergias_paciente tbody').append(fila);

                    }


                    // $('#agregar_alergia_paciente').modal('hide');
                    // $('#alergia_paciente_' + paciente).append(response.alergia);
                } else {
                    swal({
                        title: "Error al agregar alergia",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                }

                return response;

                // $('#sub_tipo_examen').append(
                //     `<option value="0">Seleccione... </option>`);
                // for (var i = 0; i < response.length; i++) {
                //     $('#sub_tipo_examen').append(`<option value="${response[i].id}">
                //                 ${response[i].nombre}
                //             </option>`);
                // }
            })
            .fail(function() {
                console.log("error");
            })

    }

    function buscar_ciudad() {

        let region = $('#perfil_region').val();
        let url = "{{ route('profesional.buscar_ciudad_region') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#perfil_ciudad');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })

                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    };

    function buscar_ciudades() {

        let region = $('#region_agregar').val();
        let url = "{{ route('profesional.buscar_ciudad_region') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#ciudad_agregar');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })

                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    };

    function buscar_ciudades_mod(id_actual = 0) {

        let region = $('#region_contacto_modificar').val();
        let url = "{{ route('profesional.buscar_ciudad_region') }}";
        $.ajax({

                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#ciudad_contacto_modificar');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="">Seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })
                    if(id_actual != 0)
                    ciudades.val(id_actual);

                } else {

                    swal({
                        title: "Error",
                        text: "Error al cargar las ciudades",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })

                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    };

    function modal_agregar_contacto_emergencia() {

        $('#agregar_contacto_emergencia').modal('show');
        $('#form_contacto_nuevo').hide();

    };

    function editar_contacto_emergencia() {

        let id_contacto = $('#id_contacto').val();

        let rut = $('#rut_contacto').val();
        let nombres = $('#nombres_contacto').val();
        let apellido_uno = $('#apellido_uno_contacto').val();
        let apellido_dos = $('#apellido_dos_contacto').val();
        let email = $('#email_contacto').val();
        let direccion = $('#direccion_contacto').val();
        let numero_dir = $('#numero_dir_contacto').val();

        let telefono = $('#telefono_contacto').val();
        let id_ciudad = $("#ciudad_contacto_modificar").val();
        let prioridad = $("#prioridad_contacto").val();
        let parentezco = $("#parentezco_contacto").val();
        let url = "{{ route('profesional.editar_contacto') }}";

        var valido = 1;
        var mensaje = ''
        if(rut == '')
        {
            valido = 0;
            mensaje += 'Debe ingresar rut.\n';
        }
        if(nombres == '')
        {
            valido = 0;
            mensaje += 'Debe ingresar nombres.\n';
        }
        if(apellido_uno == '')
        {
            valido = 0;
            mensaje += 'Debe ingresar apellido paterno.\n';
        }
        if(apellido_dos == '')
        {
            valido = 0;
            mensaje += 'Debe ingresar apellido materno.\n';
        }
        if(direccion == '')
        {
            valido = 0;
            mensaje += 'Debe ingresar direccion.\n';
        }
        if(id_ciudad == '' || id_ciudad == '0')
        {
            valido = 0;
            mensaje += 'Debe ingresar ciudad.\n';
        }
        if(email == '')
        {
            valido = 0;
            mensaje += 'Debe ingresar email.\n';
        }
        if(telefono == '')
        {
            valido = 0;
            mensaje += 'Debe ingresar telefono.\n';
        }
        if(parentezco == '' || parentezco == '0')
        {
            valido = 0;
            mensaje += 'Debe ingresar parentezco.\n';
        }
        if(prioridad == '' || prioridad == '0')
        {
            valido = 0;
            mensaje += 'Debe ingresar prioridad.\n';
        }
        {{--
        if(numero_dir == '')
        {
            valido = 0;
            mensaje += 'Debe ingresar numero direccion.\n';
        }
        --}}

        if(valido == 1)
        {
            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_contacto: id_contacto,
                        rut: rut,
                        nombres: nombres,
                        apellido_uno: apellido_uno,
                        apellido_dos: apellido_dos,
                        email: email,
                        direccion: direccion,
                        numero_dir: numero_dir,
                        telefono: telefono,
                        id_ciudad: id_ciudad,
                        prioridad: prioridad,
                        parentezco: parentezco
                    }

                })
                .done(function(data) {
                    if (data != null) {

                        swal({
                            title: "Contacto editado de forma exitosa",
                            icon: "success",
                            buttons: "Aceptar",
                            // DangerMode: true,
                        })
                        setTimeout(function() {
                            location.reload()
                        }, 100);

                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }
        else
        {
            swal({
                title: "Registro Contacto de Emergencia.",
                text: mensaje,
                icon: "error",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
        }
    };
</script>
<script src="{{ asset('js/tabla_contactos_emergencia.js') }}"></script>
<script src="{{ asset('js/tooltip_contacto_emergencia.js') }}"></script>
@endsection

@section('page-styles')
<link rel="stylesheet" href="{{ asset('css/perfiles_usuarios.css') }}">
@endsection
