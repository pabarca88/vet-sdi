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
                                <h5 class="font-weight-bolder">Editar Perfil Paciente</h5>
                            </div>
                            <ul class="breadcrumb mb-4">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ route('profesional.pacientes') }}">Mis Pacientes</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Editar Perfil Paciente</a>
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
                                        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="profile-dp">
                                                <div class="position-relative d-inline-block">
                                                    <img class="img-radius img-fluid wid-100"  src="{{ asset('images/iconos/usuario.svg') }}" alt="User image">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-md-2">
                                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="btn btn-outline-info btn-sm mb-2 mx-2 active" id="personal-tab" data-toggle="tab" href="#info_personal" role="tab" aria-controls="info_personal" aria-selected="true">
                                            <i class="feather icon-user mr-2"></i>Información Personal
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="emergencia-tab" data-toggle="tab" href="#emergencia" role="tab" aria-controls="emergencia" aria-selected="false">
                                            <i class="feather icon-user-plus mr-2"></i>Contacto de Emergencia
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="datmedicos-tab" data-toggle="tab" href="#datmedicos" role="tab" aria-controls="datmedicos" aria-selected="false">
                                            <i class="feather icon-plus-circle mr-2"></i>Datos Médicos
                                        </a>
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
                        <div class="tab-pane fade show active" id="info_personal" role="tabpanel"
                            aria-labelledby="personal-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--Card Información Básica-->
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Datos Personales</h5>

                                        </div>
                                        <!--Datos Personales-->
                                        <div class="card-body border-top info_basica collapse show" id="info_basica-1">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                    <div class="col-sm-6 my-auto ml-2">{{ $paciente->rut }} </div>
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
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">
                                                        Segundo Apellido </label>
                                                    <div class="col-sm-6 my-auto ml-2"> {{ $paciente->apellido_dos }}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                    <div class="col-sm-6 my-auto ml-2">

                                                        @if ($paciente->sexo == 'M')
                                                            Mujer
                                                        @else
                                                            Hombre
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                    <div class="col-sm-6 my-auto ml-2">
                                                        {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d/m/Y') }}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="col-sm-5 col-form-label font-weight-bolder">Previsión</label>
                                                    <div class="col-sm-6 my-auto ml-2">

                                                        @foreach ($prevision as $pre)
                                                            @if ($pre->id == $paciente->id_prevision)
                                                                {{ $pre->nombre }}
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Datos Personales-->

                                    </div>
                                    <!--Cierre: Card Datos Personales-->
                                </div>
                                <div class="col-md-6">
                                    <!--Card Contacto-->
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Contacto</h5>

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
                                                    <label
                                                        class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                    <div class="col-sm-6 my-auto ml-2"> {{ $paciente->telefono_uno }}
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Contacto-->

                                    </div>
                                    <!--Cierre: Card Contacto-->
                                    <!--Card Residencia-->
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Residencia</h5>

                                        </div>
                                        <!--Residencia-->
                                        <div class="card-body border-top info_residencial collapse show"
                                            id="info_residencial_1">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                    <div class="col-sm-6 my-auto ml-2"> {{ $ciudad->nombre }}</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label
                                                        class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                    <div class="col-sm-6 my-auto ml-2">
                                                        {{ $direccion->direccion . ' #' . $direccion->numero_dir }}
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Residencia-->
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
                                            <!--
											<button type="button" onclick="modal_agregar_contacto_emergencia();" class="btn btn-outline-light btn-sm d-inline float-right mr-4">
                                                <i class="feather icon-plus"></i> Agregar contacto
                                            </button>
											-->
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
                                                                        <th class="align-middle text-center">Parentesco</th>
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

                                                                                <button id="btn_info_contacto"
                                                                                    onclick="cargar_datos_contacto({{ $c->id }})"
                                                                                    class="btn btn-info btn-sm rounded-circle"
                                                                                    data-toggle="modal"
                                                                                    data-target="#info_contacto_emergencia"
                                                                                    title="Información de contacto"
                                                                                    data-placement="top"><i
                                                                                        class="feather icon-phone-call"></i>
                                                                                </button>

                                                                                <!--<button id="btn_editar_contacto"
                                                                                    onclick="cargar_datos_contacto({{ $c->id }})"
                                                                                    class="btn btn-warning btn-sm rounded-circle"
                                                                                    data-toggle="modal"
                                                                                    data-target="#editar_contacto_emergencia"
                                                                                    title="Editar contacto"
                                                                                    data-placement="top"><i
                                                                                        class="feather icon-edit"></i>
                                                                                </button>
                                                                                <button
                                                                                    class="btn btn-danger btn-sm rounded-circle"
                                                                                    onclick="eliminar_contacto_paciente({{ $c->id . ',' . $paciente->id }})"
                                                                                    data-toggle="tooltip"
                                                                                    title="Eliminar contacto"><i
                                                                                        class="feather icon-x"></i>
                                                                                </button>
																				-->
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
                            {{-- Datos del médico responsable del llenado y/o Actualización de datos --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <!--Card Datos profesional-->
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
                                            <h5 class="mb-0 text-white">Datos del médico responsable del llenado y/o Actualización de datos </h5>
                                        </div>
                                        <!--Datos profesional-->
                                        <div class="card-body border-top info_basica_sos collapse show"
                                            id="info_basica_sos_1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label font-weight-bolder">Rut del Profesional</label>
                                                            <div class="col-sm-7 my-auto ml-2">{{ $profesional->rut }}</div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label font-weight-bolder">Nombres y Apellidos</label>
                                                            <div class="col-sm-7 my-auto ml-2">{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}</div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <form>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label font-weight-bolder">Fecha de Actualización</label>
                                                            <div class="col-sm-7 my-auto ml-2"> 12/01/2021 * </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-4 col-form-label font-weight-bolder">Especialidad</label>
                                                            <div class="col-sm-7 my-auto ml-2">{{ $profesional->Especialidad()->first()->nombre }}</div>
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
                                                            <input type="text" class="form-control"
                                                                placeholder="Rut Profesional " value="00000000-0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Fecha de
                                                            Actualización</label>

                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control"
                                                                placeholder="Fecha Actualización" value="00000000-0">
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
                                                            <input type="text" class="form-control"
                                                                placeholder="Nombres y Apellidos"
                                                                value="Luis Armando Sepulveda Vera">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label
                                                            class="col-sm-4 col-form-label font-weight-bolder">Especialidad</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control"
                                                                placeholder="Especialidad" value="Medicina Interna">
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
                                                            <button type="submit"
                                                                class="btn btn-danger mr-2">Cancelar</button>
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

                            {{-- Antecedentes I (Transfusiones y Donación de Órganos) --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <!--Card Datos Sangre Donación de Organos-->
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center justify-content-between bg-c-blue">
                                            <h5 class="mb-0 text-white">Antecedentes I (Transfusiones y Donación de Órganos)</h5>
                                            <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial_sos" aria-expanded="false" aria-controls="info_residencial_sos_1 info_residencial_sos_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Sangre Donación de Organo-->
                                        <div class="card-body border-top info_residencial_sos collapse show" id="info_residencial_sos_1">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">¿Acepta Transfusión?</label>
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
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">¿Donante de Sangre?</label>
                                                        <div class="col-sm-7 col-form-label">
                                                            @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_sangre == 1)
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
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Grupo Sanguíneo</label>
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
                                                        <label
                                                            class="col-sm-4 col-form-label font-weight-bolder">Comentarios de grupo sanguíneo</label>
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
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Vacuna o Hepatitis</label>
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
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Comentarios Hepatitis o VIH</label>
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
                                                        <label class="col-sm-4 col-form-label font-weight-bolder"> ¿Donante Total de Órganos? </label>
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
                                                        <label class="col-sm-4 col-form-label font-weight-bolder"> ¿Donante Parcial de Órganos?
                                                        </label>
                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos_parcial == 1)
                                                                SI
                                                            @else
                                                                NO
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Órganos a donar</label>
                                                        <div class="col-sm-7 col-form-label">
                                                            @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentarios != '')
                                                                {{ $paciente->Antecedentes()->first()->comentarios }}
                                                            @else
                                                                Sin Registros
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder"> Impedimento para donar
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
                                        <div class="card-body border-top info_residencial_sos collapse "id="info_residencial_sos_2">
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
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">¿Donante de Sangre?</label>


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
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Grupo Sanguíneo</label>
                                                        <div class="col-sm-7 my-auto">
                                                            <select name="editar_grupo_sanguineo"
                                                                id="editar_grupo_sanguineo" class="form-control">
                                                                <option value="">Seleccione</option>

                                                                @if (isset($grupo_sanguineo) && $grupo_sanguineo != null && $grupo_sanguineo != '')
                                                                    @foreach ($grupo_sanguineo as $gs)
                                                                        @if (isset($paciente->Antecedentes()->first()->id_grupo_sanguineo) && $gs->id == $paciente->Antecedentes()->first()->id_grupo_sanguineo)
                                                                            <option value="{{ $gs->id }}" selected>
                                                                                {{ $gs->nombre_gs }}</option>
                                                                        @else
                                                                            <option value="{{ $gs->id }}">
                                                                                {{ $gs->nombre_gs }}</option>
                                                                        @endif
                                                                    @endforeach
                                                                @endif

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        {{--  <label class="col-sm-4 col-form-label font-weight-bolder">Comentarios de grupo sanguíneo</label>  --}}

                                                        {{--  @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentario_gs != null)
                                                            <div class="col-sm-7">
                                                                <textarea id="comentarios_gruposangre" class="form-control" placeholder="Comentarios de grupo sanguíneo">{{ $paciente->Antecedentes()->first()->comentario_gs }}</textarea>
                                                            </div>
                                                        @else
                                                            <div class="col-sm-7">
                                                                <textarea id="comentarios_gruposangre" class="form-control" placeholder="Comentarios de grupo sanguíneo"></textarea>
                                                            </div>
                                                        @endif  --}}

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Vacuna o Hepatitis</label>
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
                                                            Comentarios Hepatitis o VIH
                                                        </label>
                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentario_hepa != null)
                                                            <div class="col-sm-7">
                                                                <textarea id="comentarios_hepatitis" class="form-control" placeholder="Comentarios de hepatitis">{{ $paciente->Antecedentes()->first()->comentario_hepa }}</textarea>
                                                            </div>
                                                        @else
                                                            <div class="col-sm-7">
                                                                <textarea id="comentarios_hepatitis" class="form-control" placeholder="Comentarios"></textarea>
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row div_edit_donante_total">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">¿Donante Total de Órganos?</label>

                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos == 1)
                                                            <div class="col-sm-7 my-auto">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="1" checke onchange="validar_donante_organo_total();"d>
                                                                    <label class="form-check-label" for="donante_total_si">Si</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="0" onchange="validar_donante_organo_total();">
                                                                    <label class="form-check-label" for="donante_total_no">No</label>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-sm-7 my-auto">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="1" onchange="validar_donante_organo_total();">
                                                                    <label class="form-check-label" for="donante_total_si">Si</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="edit_donante_total" id="edit_donante_total" value="0" checked onchange="validar_donante_organo_total();">
                                                                    <label class="form-check-label" for="donante_total_no">No</label>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row div_edit_donante_parcial">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">¿Donante Parcial de Órganos?</label>

                                                        @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->dona_organos_parcial == 1)
                                                            <div class="col-sm-7 my-auto">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="1" checked onchange="validar_donante_organo_parcial();">
                                                                    <label class="form-check-label" for="donante_parcial_si">Si</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="0" onchange="validar_donante_organo_parcial();">
                                                                    <label class="form-check-label" for="donante_parcial_no">No</label>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="col-sm-7 my-auto">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="1" onchange="validar_donante_organo_parcial();">
                                                                    <label class="form-check-label"
                                                                        for="donante_parcial_si">Si</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="edit_donante_parcial" id="edit_donante_parcial" value="0" checked onchange="validar_donante_organo_parcial();">
                                                                    <label class="form-check-label" for="donante_parcial_no">No</label>
                                                                </div>
                                                            </div>
                                                        @endif


                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row div_edit_comentario">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder"> Órganos a donar </label>
                                                        <div class="col-sm-7">
                                                            @if ($paciente->Antecedentes()->first() != null && $paciente->Antecedentes()->first()->comentarios != null)
                                                                <textarea id="comentarios_organo" class="form-control" placeholder="Órganos a donar">{{ $paciente->Antecedentes()->first()->comentarios }} </textarea>
                                                            @else
                                                                <textarea id="comentarios_organo" class="form-control" placeholder="Órganos a donar"></textarea>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row div_edit_comentario_impedimento">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Impedimento para donar</label>

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
                                                <div class="col-md-5">
                                                    <div class="form-group row">
														<label id="" name="" class="floating-label-activo-sm">Código Verificación</label>
                                                        <input type="text"  class="form-control" name="codigo_varificacion" id="codigo_varificacion">
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <button type="button" onclick="editar_antecedentes_paciente({{ $paciente->id }});" class="btn btn-primary">Guardar Cambios</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--cierre(Editar) Sangre Donación de Organo-->
                                    </div>
                                    <!--Cierre: Datos Sangre Donación de Organos-->
                                </div>
                            </div>
                            @include('app.profesional.edicion_paciente.antecedentes_paciente_dos')
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
                                        </div>
                                        <!--Datos Rompe Clave-->
                                        <div class="card-body border-top rompeclave collapse show" id="rompeclave_1">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <form>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-4 col-form-label font-weight-bolder">¿Autoriza
                                                                romper clave?</label>
                                                            <div class="col-sm-7 my-auto ml-2"> Si</div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-6">
                                                    <form>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-4 col-form-label font-weight-bolder">¿Autoriza
                                                                acceso a datos confidenciales?</label>
                                                            <div class="col-sm-7 my-auto ml-2"> Si </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Cierre: Datos Rompe Clave-->
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
                                    </div>
                                    <!--Cierre: Card Contraseña Personal-->
                                </div>
                                <div class="col-md-6">
                                    <!--Card Contraseña Confidencial-->
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center justify-content-between bg-danger">
                                            <h5 class="mb-0 text-white">Cambie su Contraseña Confidencial</h5>
                                        </div>
                                        <!--Contraseña Confidencial-->
                                        <div class="card-body border-top pass_confidencial collapse show"
                                            id="pass_confidencial_1">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Contraseña
                                                        Actual</label>
                                                    <div class="col-sm-6 pt-2 ml-2"> •••••••• </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Contraseña Confidencial-->
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
    <!--Cierre: Container Completo-->
    @include('app.profesional.modales.agregar_contacto_emergencia')
    @include('app.profesional.modales.informacion_contacto_emergencia')
    @include('app.profesional.modales.editar_contacto_emergencia')
@endsection
