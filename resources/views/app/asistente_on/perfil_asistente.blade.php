@extends('template.asistente_on.template')
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
                                <a href="{{ ROUTE('asistentecm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                    <i class="feather icon-home">
                                    </i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ ROUTE('asistentecm.perfil') }}">Editar Perfil</a>
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
                                                <img class="img-radius img-fluid wid-100" src="{{ asset('images/iconos/usuario_asistente.svg') }}" alt="User image">
                                            </div>
                                            <div class="overlay">
                                                <span>Actualizar</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"><i class="feather icon-upload-cloud mr-2"></i>Cambiar foto de perfil</a>
                                        <a class="dropdown-item"><i class="feather icon-trash-2 mr-2"></i>Eliminar fotografía</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-md-2">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2 active" id="personal-tab" data-toggle="tab" href="#info_personal" role="tab" aria-controls="info_personal" aria-selected="true"><i class="feather icon-user mr-2"></i>Información Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-outline-info btn-sm mb-2 mx-2" id="emergencia-tab" data-toggle="tab" href="#emergencia" role="tab" aria-controls="emergencia" aria-selected="false"><i class="feather icon-user-plus mr-2"></i>Contacto de Emergencia</a>
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
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                <div class="col-sm-7 my-auto ml-2"> {{ $asistente->rut }} </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nombres</label>
                                                <div class="col-sm-7 my-auto ml-2"> {{ $asistente->nombres }} </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                <div class="col-sm-7 my-auto ml-2"> {{ $asistente->apellido_uno }} </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                <div class="col-sm-7 my-auto ml-2">{{ $asistente->apellido_dos }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder font-weight-bolder">Sexo</label>
                                                <div class="col-sm-7 my-auto ml-2"> 
                                                    @if($asistente->sexo == 'F') Mujer @elseif ($asistente->sexo == 'M') Hombre @endif 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                <div class="col-sm-7 my-auto ml-2"> {{ \Carbon\Carbon::parse($asistente->fecha_nac)->format('d-m-Y') }} </div>
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
                                                    <input type="text" class="form-control" placeholder="Rut" value="{{ $asistente->rut }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Nombre" value="{{ $asistente->nombres }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Primer Apellido" value="{{ $asistente->apellido_uno }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Primer Apellido" value="{{ $asistente->apellido_dos }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                <div class="col-sm-7 my-auto">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" @if($asistente->sexo == 'M') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" @if($asistente->sexo == 'F') checked @endif>
                                                        <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                <div class="col-sm-7">
                                                    <input type="date" class="form-control" value="{{ \Carbon\Carbon::parse($asistente->fecha_nac)->format('Y-m-d') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="submit" class="btn btn-info">Guardar Cambios</button>
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
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                <div class="col-sm-7 my-auto ml-2"> {{ $asistente->email }} </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Teléfono</label>
                                                <div class="col-sm-7 my-auto ml-2"> {{ $asistente->telefono_uno }}</div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Contacto-->
                                    <!--(Editar) Contacto-->
                                    <div class="card-body border-top info_contacto collapse" id="info_contacto_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Correo Electrónico</label>
                                                <div class="col-sm-7 font-weight-bolder">
                                                    <input type="text" class="form-control" placeholder="Correo Electrónico" value="{{ $asistente->email }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Teléfono</label>
                                                <div class="col-sm-7 font-weight-bolder">
                                                    <input type="text" class="form-control" placeholder="Teléfono" value="{{ $asistente->telefono_uno }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="submit" class="btn btn-info">Guardar Cambios</button>
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
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Comuna</label>
                                                <div class="col-sm-7 my-auto ml-2">{{ $asistente->Direccion()->first()->Ciudad()->first()->nombre }}</div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
                                                <div class="col-sm-7 my-auto ml-2">{{ $asistente->Direccion()->first()->direccion }}</div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Residencia-->
                                    <!--(Editar) Residencia-->
                                    <div class="card-body border-top info_residencial collapse " id="info_residencial_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Comuna</label>
                                                <div class="col-sm-7">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>Seleccione su comuna</option>
                                                        <option selected>Viña del Mar</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Dirección</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Dirección" value="Calle Nº Depto..">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="submit" class="btn btn-info">Guardar Cambios</button>
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
                                        <button type="button" class="btn btn-outline-light btn-sm d-inline float-right mr-4" data-toggle="modal" data-target="#agregar_contacto_emergencia">
                                            <i class="feather icon-plus"></i> Agregar contacto
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="overflow-x:auto;">
                                                    <table id="contactos_emergencia" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle text-center">Prioridad</th>
                                                        <th class="align-middle text-center">Nombre</th>
                                                        <th class="align-middle text-center">Parentezco</th>
                                                        <th class="align-middle text-center">Acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($asistente->ContactosEmergencia()->get() as $co)
                                                    <tr>
                                                        <td class="align-middle text-center">{{ $co->prioridad }}</td>
                                                        <td class="align-middle text-center">
                                                            {{ $co->nombre }}
                                                            <br>
                                                            {{ $co->apellido_uno }}
                                                            {{ $co->apellido_dos }}
                                                        </td>
                                                        <td class="align-middle text-center">{{ $co->pivot->relacion }}</td>
                                                        <td class="align-middle text-center">
                                                            <button id="btn_info_contacto" class="btn btn-info btn-sm rounded-circle" data-toggle="modal" data-target="#info_contacto_emergencia" title="Información de contacto" data-placement="top"><i class="feather icon-phone-call"></i></button>
                                                              <button id="btn_editar_contacto" class="btn btn-warning btn-sm rounded-circle" data-toggle="modal" data-target="#editar_contacto_emergencia" title="Editar contacto" data-placement="top"><i class="feather icon-edit"></i></button>
                                                              <button class="btn btn-danger btn-sm rounded-circle" data-toggle="tooltip" title="Eliminar contacto"><i class="feather icon-x"></i></button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
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
                    <!--Tab Cambiar Contraseñas-->
                    <div class="tab-pane fade" id="pass" role="tabpanel" aria-labelledby="pass-tab">
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
                                                <label class="col-sm-4 col-form-label">Contraseña Actual</label>
                                                <div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> •••••••• </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: Contraseña Personal-->
                                    <!--(Editar)Contraseña Personal-->
                                    <div class="card-body border-top pass_personal collapse" id="pass_personal_2">
                                        <form>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Contraseña Actual</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Contraseña Actual">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Nueva Contraseña</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Nueva Contraseña">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label font-weight-bolder">Repita su Contraseña</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" placeholder="Repita la Contraseña">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-form-label"></label>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-danger mr-2">Cancelar</button>
                                                    <button type="submit" class="btn btn-info">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!--Cierre: (Editar)Contraseña Personal-->
                                </div>
                                <!--Cierre: Card Contraseña Personal-->
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

<!-- Modal agregar contacto emergencia-->
<div id="agregar_contacto_emergencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_contacto_emergencia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
               <h5 class="modal-title text-white text-center">Agregar contacto de emergencia</h5>
               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <h6 class="text-c-blue ml-1 mb-3">Ingrese los datos de su contacto de emergencia</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Rut</label>
                                <input type="person" class="form-control" name="rut_paciente" id="rut_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Nombres</label>
                                <input type="text" class="form-control" name="nombres_paciente" id="nombres_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos_paciente" id="apellidos_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Dirección</label>
                                <input type="address" class="form-control" name="direccion_paciente" id="direccion_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Comuna</label>
                                <select id="comuna_paciente" name="comuna_paciente" class="form-control">
                                    <option>Seleccione una opción</option>
                                    <optgroup label="Valparaíso">
                                        <option>Viña del Mar</option>
                                        <option>La Calera</option>
                                        <option>Valparaíso</option>
                                    </optgroup> 
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Correo Electrónico</label>
                                <input type="email" class="form-control" name="email_paciente" id="email_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Teléfono</label>
                                <input type="tel" class="form-control" name="telefono_paciente" id="telefono_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Parentezco</label>
                                <select id="parentezco" name="parentezco" class="form-control">
                                    <option>Seleccione una opción</option>
                                    <option>Pareja</option>
                                    <option>Padre</option>
                                    <option>Madre</option>
                                    <option>Hermano/a</option>
                                    <option>Abuelo/a</option>  
                                    <option>Tío/a</option> 
                                    <option>Primo/a</option> 
                                    <option>Amigo/a</option> 
                                    <option>Otro</option><!--Si se selecciona "otro"
                                    deberia abrirse un input text para que el usuario escriba
                                    el parentezco-->   
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Prioridad</label>
                                <select id="prioridad" name="prioridad" class="form-control">
                                    <option>Seleccione una opción</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>   
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-info">Guardar Contacto</button>
            </div>
        </div>
   </div>
</div>

<!-- Modal información de contacto emergencia-->
<div id="info_contacto_emergencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info_contacto_emergencia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
               <h5 class="modal-title text-white text-center">Información de contacto</h5>
               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-borderless">
                          <tbody>
                              <tr>
                              <th scope="row">Rut</th>
                              <td>12.345.546-0</td>
                            </tr>
                            <tr>
                              <th scope="row">Nombre</th>
                              <td>Alvaro Alejandro<br>
                                    Cortés Díaz
                                </td>
                            </tr>
                            <tr>
                              <th scope="row">Dirección</th>
                              <td>Las Maravillas #123,<br>
                              Viña del Mar</td>
                            </tr>
                            <tr>
                              <th scope="row">Teléfono</th>
                              <td>78237838</td>
                            </tr>
                            <tr>
                              <th scope="row">Email</th>
                              <td>contacto@dominio.cl</td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
   </div>
</div>

<!-- Modal Editar contacto emergencia-->
<div id="editar_contacto_emergencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_contacto_emergencia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
               <h5 class="modal-title text-white text-center">Editar contacto de emergencia</h5>
               <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Rut</label>
                                <input type="person" class="form-control" name="rut_paciente" id="rut_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Nombres</label>
                                <input type="text" class="form-control" name="nombres_paciente" id="nombres_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos_paciente" id="apellidos_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Dirección</label>
                                <input type="address" class="form-control" name="direccion_paciente" id="direccion_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Comuna</label>
                                <select id="comuna_paciente" name="comuna_paciente" class="form-control">
                                    <option>Seleccione una opción</option>
                                    <optgroup label="Valparaíso">
                                        <option>Viña del Mar</option>
                                        <option>La Calera</option>
                                        <option>Valparaíso</option>
                                    </optgroup> 
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Correo Electrónico</label>
                                <input type="email" class="form-control" name="email_paciente" id="email_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Teléfono</label>
                                <input type="tel" class="form-control" name="telefono_paciente" id="telefono_paciente">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Parentezco</label>
                                <select id="parentezco" name="parentezco" class="form-control">
                                    <option>Seleccione una opción</option>
                                    <option>Pareja</option>
                                    <option>Padre</option>
                                    <option>Madre</option>
                                    <option>Hermano/a</option>
                                    <option>Abuelo/a</option>  
                                    <option>Tío/a</option> 
                                    <option>Primo/a</option> 
                                    <option>Amigo/a</option> 
                                    <option>Otro</option><!--Si se selecciona "otro"
                                    deberia abrirse un input text para que el usuario escriba
                                    el parentezco-->   
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Prioridad</label>
                                <select id="prioridad" name="prioridad" class="form-control">
                                    <option>Seleccione una opción</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>   
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-info">Guardar Cambios</button>
            </div>
        </div>
   </div>
</div>
@endsection