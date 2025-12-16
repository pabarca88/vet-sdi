@extends('template.adm_cm.template')
@section('content')
<!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="font-weight-bolder">Configurar Mi Escritorio Comercial</h5>
                            </div>
                            <ul class="breadcrumb mb-4">
                                <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Perfil Administrador Comercial</a>
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
                            <div class="col-md-12 text-center mt-n3">
                                <div class="change-profile text-center">
                                    <div class="dropdown w-auto d-inline-block">
                                        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="profile-dp">
                                                <div class="position-relative d-inline-block">
                                                    <img class="img-radius img-fluid wid-100" src="{{ asset('images/iconos/cm-perfiles.png') }}"> alt="User image">
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
                            <div class="col-md-12 mt-4">
                                <!-- tab general -->
                                <div class="user-profile user-card pt-0">
                                    <div class="card-body py-0">
                                        <div class="user-about-block m-0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link text-reset before:active " id="p-adm-tab" data-toggle="tab" href="#p-adm" role="tab" aria-controls="p-adm" aria-selected="true"><i class="feather icon-user mr-2"></i>Perfil administrador Adm Comercial</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-reset" id="info_cuenta_inst_tab" data-toggle="tab" href="#info_cuenta_inst" role="tab" aria-controls="info_cuenta_inst" aria-selected="false"><i class="feather  icon-lock mr-2"></i>Cuenta Institucional</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-reset" id="rol-permiso-tab" data-toggle="tab" href="#rol-permiso" role="tab" aria-controls="rol-permiso" aria-selected="false"><i class="feather  icon-lock mr-2"></i>Asignar Usuario y Clave</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="myTabContent">
                        <!--PERFIL ADMINISTRADOR COMERCIAL-->
                        <div class="tab-pane fade show active" id="p-adm" role="tabpanel" aria-labelledby="p-adm-tab">
                            <div class="row mb-3 mt-0">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card mb-1">
                                        <div class="card-body">
                                            <h4 class="f-18 mb-0 text-info">Perfil administrador Comercial de la Institución</h4>
                                            <input type="hidden" name="id_responsable" id="id_responsable" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        @if(isset($director_comercial))
                                        <!--Datos Personales-->
                                        <div class="card-body border-top info_basica collapse show" id="info_basica-1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <label class="label font-weight-bolder">RUT</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <label class="label ">{{ $director_comercial->rut }}</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <label class="label font-weight-bolder">Nombre</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="label ">{{ $director_comercial->nombre }} {{ $director_comercial->apellido_uno }} {{ $director_comercial->apellido_dos }}</label>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <label class="label font-weight-bolder">Sexo</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <label class="label">{{ $director_comercial->sexo == 'F' ? 'FEMENINO' : 'MASCULINO' }}</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <label class="label font-weight-bolder">F. Nacimiento</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <label class="label">{{ $director_comercial->fecha_nac }}</label>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                        <!--Cierre: Datos Personales-->
                                        <!--(Editar)Datos Personales-->
                                        <div class="card-body border-top info_basica collapse" id="pinfo_basica_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 mb-2">
                                                        <h6 class="text-c-blue">INFORMACIÓN Y DATOS DE CONTACTO</h6>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">RUT:</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_empleado_rut" id="edit_empleado_rut" value="">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Nombres</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_empleado_nombre" id="edit_empleado_nombre">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Apellido Paterno</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_empleado_apellido_uno" id="edit_empleado_apellido_uno">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Apellido Materno</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_empleado_apellido_dos" id="edit_empleado_apellido_dos">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Sexo</label>
                                                        <select class="form-control form-control-sm" name="edit_empleado_sexo" id="edit_empleado_sexo">
                                                            <option value="">Seleccione</option>
                                                            <option value="F">Femenino</option>
                                                            <option value="M">Masculino</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Fecha Nacimiento</label>
                                                        <input type="date" class="form-control form-control-sm" name="edit_empleado_fecha_nacimiento" id="edit_empleado_fecha_nacimiento">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: (Editar)Datos Personales-->
                                    </div>
                                    <!--Cierre: Card Datos Personales-->
                                </div>
                                <div class="col-md-6">
                                    <!--Contraseña-->
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Cambiar contraseña</h5>
                                            <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".pass_personal" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Contraseña-->
                                        <div class="card-body pass_personal collapse show" id="pass_personal_1">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Contraseña actual</label>
                                                    <div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> •••••••• </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Contraseña-->
                                        <!--(Editar)Contraseña-->
                                        <div class="card-body pass_personal collapse" id="pass_personal_2">
                                            <form method="get" action="{{ route('adm_cm.cambio_contrasena_responsable')}}" id="form_cambio_contrasena_perfil_responsable" name="form_cambio_contrasena_perfil_responsable">
                                                <input type="hidden" name="responsable_id" id="responsable_id" value="">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Contraseña actual</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" class="form-control form-control-sm" name="responsable_actual" id="responsable_actual" placeholder="Contraseña Actual">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Nueva contraseña</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" class="form-control form-control-sm" name="responsable_nueva" id="responsable_nueva" placeholder="Nueva Contraseña">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Repitir contraseña</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" class="form-control form-control-sm" name="responsable_validacion" id="responsable_validacion" placeholder="Repita la Contraseña">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label"></label>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-sm btn-danger mr-2">Cancelar</button>
                                                        <button type="submit" class="btn btn-sm btn-info">Guardar cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: (Editar)Contraseña-->
                                    </div>
                                    <!--Cierre:Contraseña-->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!--Card Contacto-->
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Info Contacto</h5>
                                            <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Contacto-->
                                        <div class="card-body border-top info_contacto collapse show" id="info_contacto_1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <label class="label font-weight-bolder">Email</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <label class="label ">JperezCotapos@gmail.com</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                        <label class="label font-weight-bolder">Teléfonos</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <label class="label ">+5698789665/+5696547589</label>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label font-weight-bolder">Región</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label">Quinta</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label font-weight-bolder">Ciudad</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label">Viña del mar</label>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <!--Cierre: Contacto-->
                                        <!--(Editar) Contacto-->
                                        <div class="card-body border-top info_contacto collapse " id="info_contacto_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <label class="floating-label">Correo Electrónico</label>
                                                        <input type="text" class="form-control form-control-sm" name="Perfil_email" id="Perfil_email" value="">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <label class="floating-label">Teléfonos</label>
                                                        <input type="text" class="form-control form-control-sm" name="Perfil_fono" id="Perfil_fono" value="">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <label class="floating-label-activo-sm">Región</label>
                                                        <select class="form-control form-control-sm" name="edit_empleado_region" id="edit_empleado_region">
                                                            <option value="">Seleccione</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <label class="floating-label-activo-sm">Ciudad</label>
                                                        <select class="form-control form-control-sm" name="edit_empleado_ciudad" id="edit_empleado_ciudad">
                                                            <option value="">Seleccione</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-3 col-xl-4">
                                                        <label class="floating-label">Dirección</label>
                                                        <input type="text" class="form-control form-control-sm" name="perfil_dire" id="perfil_dire" value="">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        <label class="floating-label">Piso/Depto</label>
                                                        <input type="text" class="form-control form-control-sm" name="perfil_numero_dir" id="perfil_numero_dir" value="">
                                                    </div>

                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label"></label>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                        <button type="button" onclick="editar_responsable_datos_contacto()" class="btn btn-info">Guardar Cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--(Editar) Contacto-->
                                    </div>
                                    <!--Cierre: Card Contacto-->
                                    <!--Card Residencia-->
                                    <div class="card" hidden>
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

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                    <div class="col-sm-6 my-auto ml-2">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                    <div class="col-sm-6 my-auto ml-2">

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Residencia-->
                                        <!--(Editar) Residencia-->
                                        <div class="card-body border-top info_residencial collapse " id="info_residencial_2">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" onchange="buscar_ciudad_responsable();" id="perfil_region" name="perfil_region">
                                                            <option value="">Seleccione una Región</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Ciudad</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" id="perfil_ciudad" name="perfil_ciudad">
                                                            <option value="">Seleccione su comuna</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Depto</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label"></label>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                        <button type="button" onclick="editar_responsable_datos_residencia();" class="btn btn-info">Guardar Cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--(Editar) Residencia-->
                                    </div>
                                    <!--Cierre: Card Residencia-->
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Agregar Datos para Liquidaciones</h5>
                                            <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".liquidaciones" aria-expanded="false" aria-controls="liquidaciones_1 liquidaciones_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <div class="card-body border-top liquidaciones collapse show" id="liquidaciones_1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="label font-weight-bolder">Rut</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="label font-weight-bolder">Nombre Titular</label>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6" style="margin-top:-1.5rem;">
                                                        <label class="label ">20.123.365-k</label>
                                                    </div>

                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6" style="margin-top:-1.5rem;">
                                                        <label class="label ">juan jose Perez-Cotapos arguiluyo</label>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="label font-weight-bolder">Banco</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="label font-weight-bolder">Tipo de Cuenta</label>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6" style="margin-top:-1.5rem;">
                                                        <label class="label">Banco Nacional</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6" style="margin-top:-1.5rem;">
                                                        <label class="label">corriente</label>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="label font-weight-bolder">Email deposito</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="label font-weight-bolder">N° de Cuenta</label>
                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6" style="margin-top:-1.5rem;">
                                                        <label class="label">Email@deposito.cl</label>
                                                    </div>

                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6" style="margin-top:-1.5rem;">
                                                        <label class="label">202000023212</label>
                                                    </div>
                                                </div>
                                            </form>


                                        </div>
                                        <div class="card-body liquidaciones collapse" id="liquidaciones_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 mb-2">
                                                        <h6 class="text-c-blue">INFORMACIÓN Y DATOS BANCO</h6>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">RUT:</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_empleado_rut" id="edit_empleado_rut" value="">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Nombre Titular</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_empleado_nombre" id="edit_empleado_nombre">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Banco</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_empleado_apellido_uno" id="edit_empleado_apellido_uno">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Email deposito</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_empleado_apellido_dos" id="edit_empleado_apellido_dos">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Tipo de cuenta</label>
                                                        <select class="form-control form-control-sm" name="edit_empleado_sexo" id="edit_empleado_sexo">
                                                            <option value="">Seleccione</option>
                                                            @foreach($tipo_cuentas_bancarias as $tipo_cuenta)
                                                            <option value="{{ $tipo_cuenta->id }}">{{ $tipo_cuenta->descripcion }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">N° de cuenta</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_empleado_fecha_nacimiento" id="edit_empleado_fecha_nacimiento">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: PERFIL ADMINISTRADOR-->
                        <div class="tab-pane fade" id="info_cuenta_inst" role="tabpanel" aria-labelledby="info_cuenta_inst-tab">
                            <div>
                                <button type="button" class="btn btn-light btn-sm btn-icon m-0 " data-toggle="modal" data-target="#modalAgregarCuentaInst" >
                                    <i class="feather icon-plus"></i>
                                </button>
                            </div>
                            <div class="row" id="contenedor_cuentas_bancarias">
                                @foreach($cuentas_bancarias as $cuenta_bancaria)
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Agregar Datos depósitos</h5>
                                            <div>
                                                <button type="button" class="btn btn-light btn-sm btn-icon m-0 "  onclick="eliminar_cuenta_bancaria({{ $cuenta_bancaria->id }})">
                                                    <i class="feather icon-trash"></i>
                                                </button>
                                                <button type="button" class="btn btn-light btn-sm btn-icon m-0" data-toggle="collapse" data-target=".liquidaciones_{{ $cuenta_bancaria->id }}" aria-expanded="false" aria-controls="liquidaciones_1_{{ $cuenta_bancaria->id }} liquidaciones_2_{{ $cuenta_bancaria->id }}">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="card-body border-top liquidaciones_{{ $cuenta_bancaria->id }} collapse show" id="liquidaciones_1_{{ $cuenta_bancaria->id }}">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label font-weight-bolder">Rut</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label ">{{ $cuenta_bancaria->rut_titular }}</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label font-weight-bolder">Nombre Titular</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label ">{{ $cuenta_bancaria->nombre_titular }}</label>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label font-weight-bolder">Banco</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label">{{ $cuenta_bancaria->nombre_banco }}</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label font-weight-bolder">Email deposito</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label">{{ $cuenta_bancaria->email }}</label>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label font-weight-bolder">Tipo de Cuenta</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label">{{ $cuenta_bancaria->descripcion }}</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label font-weight-bolder">N° de Cuenta</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label">{{ $cuenta_bancaria->numero_cuenta }}</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label font-weight-bolder">Rut representante</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label">{{ $cuenta_bancaria->rut_representante }}</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label font-weight-bolder">Nombre representante</label>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="label">{{ $cuenta_bancaria->nombre_representante }}</label>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="card-body liquidaciones_{{ $cuenta_bancaria->id }} collapse" id="liquidaciones_2_{{ $cuenta_bancaria->id }}">

                                            <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 mb-2">
                                                        <h6 class="text-c-blue">INFORMACIÓN Y DATOS BANCO</h6>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">RUT:</label>
                                                        <input type="text" class="form-control form-control-sm" oninput="formatoRut(this)" name="edit_rut_titular_{{ $cuenta_bancaria->id }}" id="edit_rut_titular_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->rut_titular }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Nombre Titular</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_nombre_titular_{{ $cuenta_bancaria->id }}" id="edit_nombre_titular_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->nombre_titular }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Banco</label>
                                                        <select name="edit_banco_titular_{{ $cuenta_bancaria->id }}" id="edit_banco_titular_{{ $cuenta_bancaria->id }}" class="form-control form-control-sm">
                                                            <option value="0">Seleccione</option>
                                                            @foreach($bancos as $banco)
                                                            <option value="{{ $banco->id }}" @if($cuenta_bancaria->id_banco == $banco->id) selected @endif>{{ $banco->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Email deposito</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_email_titular_{{ $cuenta_bancaria->id }}" id="edit_email_titular_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->email }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Tipo de cuenta</label>
                                                        <select class="form-control form-control-sm" name="edit_tipo_cuenta_{{ $cuenta_bancaria->id }}" id="edit_tipo_cuenta_{{ $cuenta_bancaria->id }}">
                                                            <option value="0">Seleccione</option>
                                                            @foreach($tipo_cuentas_bancarias as $tipo_cuenta)
                                                            <option value="{{ $tipo_cuenta->id }}" @if($cuenta_bancaria->id_tipo_cuenta == $tipo_cuenta->id) selected @endif>{{ $tipo_cuenta->descripcion }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">N° de cuenta</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_numero_cuenta_{{ $cuenta_bancaria->id }}" id="edit_numero_cuenta_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->numero_cuenta }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Rut Representante</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_rut_representante_{{ $cuenta_bancaria->id }}" id="edit_rut_representante_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->rut_representante }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-4 col-lg-4">
                                                        <label class="floating-label-activo-sm">Nombre Representante</label>
                                                        <input type="text" class="form-control form-control-sm" name="edit_nombre_representante_{{ $cuenta_bancaria->id }}" id="edit_nombre_representante_{{ $cuenta_bancaria->id }}" value="{{ $cuenta_bancaria->nombre_representante }}">
                                                    </div>
                                            </div>
                                            <button type="button" class="btn btn-outline-success btn-sm float-right" onclick="editar_cuenta_bancaria({{ $cuenta_bancaria->id }})"><i class="fas fa-save"></i> Editar</button>

                                        </div>

                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--ADMINISTRADOR DE ROLES Y PERMISOS-->
                        <div class="tab-pane fade" id="rol-permiso" role="tabpanel" aria-labelledby="rol-permiso-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--Contraseña-->
                                    <div class="card">
                                        <div class="card-header pt-3 pb-2 bg-light">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="f-18 d-inline mt-3 text-info">Asignar y Desasociar Personal de La Institución</h6>
                                                    <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                        <button type="button" class="btn btn-sm btn-info" onclick="añadir_rol();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir Rol y Usuario</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12">



                                                    <table id="adm_roles" class="display table table-striped table-xs dt-responsive nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-wrap text-left align-middle">Nombre</th>
                                                                <th class="text-wrap text-left align-middle">Rut</th>
                                                                <th class="text-wrap text-left align-middle">Rol</th>
                                                                <th class="text-wrap text-center align-middle">desasociar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: ADMINISTRADOR DE ROLES Y PERMISOS-->


                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--  MODALES CONFIGURACION  --}}

    {{--  MODAL  SUCURSAL  --}}
    {{--  <div id="a_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_sucursal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir nueva sucursal</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Rut</label>
                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Nombre</label>
                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Dirección</label>
                                    <input class="form-control form-control-sm" name="direccion" id="direccion_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Región</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione una opción</option>
                                        <optgroup label="Valparaíso">
                                            <option value="AL">Viña del Mar</option>
                                            <option value="LA">La Calera</option>
                                            <option value="VA">Valparaíso</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Comuna</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Correo electrónico</label>
                                    <input class="form-control form-control-sm" name="email" id="email" type="email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Teléfono</label>
                                    <input class="form-control form-control-sm" name="telefono_1" id="telefono_1" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Teléfono (opcional)</label>
                                    <input class="form-control form-control-sm" name="telefono_2" id="telefono_2" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="not_pacientes_1">
                                        <label for="not_pacientes_1" class="cr"></label>
                                        <label>Notificar a pacientes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-sm mx-auto">Añadir nueva sucursal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  --}}

     {{--  <div id="e_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="e_sucursal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Editar sucursal ( Nombre de sucursal)
                        <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Rut</label>
                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Nombre</label>
                                    <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label">Dirección</label>
                                    <input class="form-control form-control-sm" name="direccion" id="direccion_lugar_atencion" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Región</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <optgroup label="Valparaíso">
                                            <option value="AL">Viña del Mar</option>
                                            <option value="LA">La Calera</option>
                                            <option value="VA">Valparaíso</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Comuna</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <option value="AL">Viña del Mar</option>
                                        <option value="LA">La Calera</option>
                                        <option value="VA">Valparaíso</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Correo electrónico</label>
                                    <input class="form-control form-control-sm" name="email" id="email" type="email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Teléfono</label>
                                    <input class="form-control form-control-sm" name="telefono_1" id="telefono_1" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Teléfono (opcional)</label>
                                    <input class="form-control form-control-sm" name="telefono_2" id="telefono_2" type="text">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="switch switch-success d-inline m-r-10">
                                        <input type="checkbox" id="not_pacientes_1">
                                        <label for="not_pacientes_1" class="cr"></label>
                                        <label>Notificar a pacientes</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>  --}}

    {{--  <div id="asistentes_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asistentes_sucursal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Asistentes de ( Nombre de sucursal)
                        <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Ingrese Rut de el o la asistente que desea asociar a su lugar de atención</h6>
                            </div>
                            <div class="col-sm-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control form-control-sm" placeholder="Rut" aria-label="Rut" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-info btn-sm" type="button" id="button-addon2">Asociar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <!--TABLA RESPONSIVA HACIA ABAJO-->
                                <table id="res-config" class="display table table-striped dt-responsive nowrap text-center table-xs" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Acción</th>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="habdes_1">
                                                    <label class="custom-control-label" for="habdes_1"></label>
                                                </div>
                                            </td>
                                            <td>00.000.000-0</td>
                                            <td>Pepita Sanchez Díaz</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  --}}

    {{--  <div id="horario_sucursal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="horario_sucursal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Horario de ( Nombre de sucursal)
                        <!--Sin los parentesis, solo cargar el nombre de la sucursal-->
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="text-c-blue">Horario de atención</h6>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group fill">
                                    <label class="floating-label">Día</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <option>Lunes a viernes</option>
                                        <option>Sabado y domingos</option>
                                        <option>Lunes</option>
                                        <option>Martes</option>
                                        <option>Miércoles</option>
                                        <option>Jueves</option>
                                        <option>Viernes</option>
                                        <option>Sábado</option>
                                        <option>Domingo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group fill">
                                    <label class="floating-label">Desde</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <option>Cargar horas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group fill">
                                    <label class="floating-label">Hasta</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione</option>
                                        <option>Cargar horas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <button type="button" class="btn btn-info btn-sm btn-block">Añadir horario</button></td>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <!--TABLA RESPONSIVA HACIA ABAJO-->
                                <table id="res-config" class="display table table-striped dt-responsive nowrap table-xs text-center" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Desde</th>
                                            <th>Hasta</th>
                                            <th>Día</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>8:00 am</td>
                                            <td>19:00 pm</td>
                                            <td>Martes</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button></td>
                                        </tr>
                                        </tr>
                                        <tr>
                                            <td>8:00 am</td>
                                            <td>19:00 pm</td>
                                            <td>Lunes a viernes</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button></td>
                                        </tr>
                                        <tr>
                                            <td>10:00 am</td>
                                            <td>14:00 pm</td>
                                            <td>Sábado</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="feather icon-x"></i></button></td>
                                        </tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  --}}

    {{--  MODAL DESASOCIAR  --}}
    <div id="permisos_rol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="permisos_rol" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Desasociar Funcionario</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-modal active" id="uno_tab" data-toggle="pill" href="#uno" role="tab" aria-controls="uno" aria-selected="true">Datos del Funcionario</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-modal" id="dos_tab" data-toggle="pill" href="#dos" role="tab" aria-controls="pills-home" aria-selected="true">Desasociar y cambiar clave</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tablas-remuneraciones">
                            <!--INFORMACION DE ACCESO-->
                            <div class="tab-pane fade show active" id="uno" role="tabpanel" aria-labelledby="uno_tab">
                                <div class="row haberes collapse show" id="info_funcionario-1">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <h5 class="text-info">DATOS DEL FUNCIONARIO</h5>
                                        <hr class="mt-1">
                                    </div>

                                    <div class="col-sm-12 col-md-12 mb-3">
                                        <div class="table-responsive">
                                            <table id="info_funcionario" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th class="align-middle">Rut</th>
                                                        <th class="align-middle" id="personal_desha_rut"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Nombre</th>
                                                        <th class="align-middle" id="personal_desha_nombre"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Rol</th>
                                                        <th class="align-middle" id="personal_desha_rol"></th>
                                                    </tr>
													<tr>
                                                        <th class="align-middle">Usuario</th>
                                                        <th class="align-middle" id="personal_desha_correo"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Clave</th>
                                                        <th class="align-middle" id="personal_desha_clave"></th>
                                                        <input type="hidden" name="personal_desha_clave_id" id="personal_desha_clave_id" value="">
                                                    </tr>
                                                </tbody>
                                                <tfoot class="bg-tfoot-info-claro">
                                                    <tr>
                                                        <th class="align-middle">La Contrataria Nuevamente?</th>
                                                        <th class="align-middle">NO</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--DEBERES-->
                            <div class="tab-pane fade" id="dos" role="tabpanel" aria-labelledby="dos_tab">
                                <div class="row deberes collapse show" id="deberes-1">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <h5 class="text-info">DESASOCIAR</h5>
                                        <hr class="mt-0">
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-info d-inline">CAMBIAR CREDENCIALES</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="table-responsive">
                                            <table id="rend-caja-dental"
                                                class="display table-bordered table table-striped dt-responsive nowrap table-xs"
                                                style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th class="align-middle">CLAVE</th>
                                                        <th class="align-middle">
                                                            <input type="text" class="form-control form-control-sm" id="personal_desha_clave_edit" placeholder="Clave de Acceso">
                                                            <input type="hidden" name="personal_desha_clave_id" id="personal_desha_clave_id_edit" value="">
                                                            <input type="hidden" name="personal_desha_clave_id" id="personal_id_persona" value="">
                                                            <input type="hidden" name="personal_desha_clave_id" id="personal_id_personal" value="">
                                                            <input type="hidden" name="personal_desha_clave_id" id="personal_id_lugar_atencion" value="">
                                                            <input type="hidden" name="personal_desha_clave_id" id="personal_tipo_personal_edit" value="">
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">MOTIVO TÉRMINO RELACIÓN</th>
                                                        <th class="align-middle"><input type="text" class="form-control form-control-sm" id="personal_desha_motivo_temrino" placeholder="Motivo Término Relación"></th>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th class="align-middle bg-tfoot-info-claro">LA VOLVERIA A CONTRATAR ?</th>
                                                        <th class="align-middle"><input type="text" class="form-control form-control-sm" id="personal_desha_volver_contratar" placeholder="La volvería a contratar"></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
								</div>
                                <div class="row-">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-info btn-sm mx-auto" onclick="cambiarContrasenalugarAtencion()">Guardar cambios</button>
                                    </div>
                                </div>

							</div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
                </div> -->

            </div>
        </div>
    </div>

    {{--  MODAL AGREGAR RESUMEN CONTRATO, ROLES, ACCESO --}}


    {{--  MODAL AREA  --}}
    <div id="a_area" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_area" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir área</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar áreas-->
                                    <label class="floating-label-activo-sm">Área</label>
                                    <select class="form-control form-control-sm">
                                        <option value="">-Seleccione</option>
                                        <option value="">-Administración General</option>
                                        <option value="">-Administración Médica</option>
                                        <option value="">-Administración financiera</option>
                                        <option value="">-Administración comercial</option>
                                        <option value="">-Boxes de Atención</option>
                                        <option value="">-Boxes de Vacunatorio y Curaciones</option>
                                        <option value="">-Pabellones</option>
                                        <option value="">-Laboratorio Clìnico</option>
                                        <option value="">-Laboratorio Especialidades</option>
                                        <option value="">-Laboratorio Radiologìa</option>
                                        <option value="">-Farmacia</option>
                                        <option value="">-Bodega</option>
                                        <option value="">-Mantención y Aséo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-info btn-sm mx-auto">Añadir</button>
                </div>
            </div>
        </div>
    </div>

    {{--  MODAL ESPECIALIDADES  --}}



<!--Cierre: Container Completo-->
@endsection

@section('modales')
<!-- modalAgregarCuentaInst -->
<div class="modal fade" id="modalAgregarCuentaInst" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCuentaInst" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar Cuenta Bancaria Institución</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label class="floating-label-activo-sm">Rut Titular</label>
                            <input type="text" class="form-control form-control-sm" oninput="formatoRut(this)" name="rut_titular_nuevo" id="rut_titular_nuevo">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label class="floating-label-activo-sm">Nombre Titular</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_titular_nuevo" id="nombre_titular_nuevo">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label class="floating-label-activo-sm">Banco Titular</label>
                            <select name="banco_titular_nuevo" id="banco_titular_nuevo" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @foreach($bancos as $banco)
                                    <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label class="floating-label-activo-sm">Email Titular</label>
                            <input type="email" class="form-control form-control-sm" name="email_titular_nuevo" id="email_titular_nuevo">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label class="floating-label-activo-sm">Tipo Cuenta</label>
                            <select class="form-control form-control-sm" name="tipo_cuenta_nuevo" id="tipo_cuenta_nuevo">
                                <option value="0">Seleccione</option>
                                <option value="1">Cuenta Corriente</option>
                                <option value="2">Cuenta Vista</option>
                                <option value="3">Cuenta Ahorro</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label class="floating-label-activo-sm">Número Cuenta</label>
                            <input type="text" class="form-control form-control-sm" name="numero_cuenta_nuevo" id="numero_cuenta_nuevo">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label class="floating-label-activo-sm">Rut Representante</label>
                            <input type="text" class="form-control form-control-sm" name="rut_representante_nuevo" id="rut_representante_nuevo">
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <label class="floating-label-activo-sm">Nombre Representante</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_representante_nuevo" id="nombre_representante_nuevo">
                        </div>
                    </div>
                </form>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm mx-auto" onclick="agregar_cuenta_bancaria();">Agregar Cuenta Bancaria</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
    <!--SCRIPT MODALS-->
    <script>

         $(document).ready(function() {
            $('#adm_roles').DataTable({
                responsive: true
            });
        });

        function editar_cuenta_bancaria(id){
            let rut_titular = $('#edit_rut_titular_'+id).val();
            let nombre_titular = $('#edit_nombre_titular_'+id).val();
            let banco_titular = $('#edit_banco_titular_'+id).val();
            let email_titular = $('#edit_email_titular_'+id).val();
            let tipo_cuenta = $('#edit_tipo_cuenta_'+id).val();
            let numero_cuenta = $('#edit_numero_cuenta_'+id).val();
            let rut_representante = $('#edit_rut_representante_'+id).val();
            let nombre_representante = $('#edit_nombre_representante_'+id).val();

            let valido = 1;
            let mensaje = '';

            if(rut_titular == ''){
                mensaje += "Debe ingresar rut<br>";
                valido = 0;
            }

            if(nombre_titular == ''){
                mensaje += "Debe ingresar nombre<br>";
                valido = 0;
            }

            if(banco_titular == ''){
                mensaje += "Debe ingresar banco<br>";
                valido = 0;
            }

            if(email_titular == ''){
                mensaje += "Debe ingresar email<br>";
                valido = 0;
            }

            if(tipo_cuenta == 0){
                mensaje += "Debe seleccionar un tipo de cuenta<br>";
                valido = 0;
            }

            if(numero_cuenta == ''){
                mensaje += "Debe ingresar numero de cuenta<br>";
                valido = 0;
            }

            if(valido == 0){
                swal({
                    title:'Error',
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje
                        },
                    },
                    icon:'error'
                });

                return;
            }

            let data = {
                rut_titular : rut_titular,
                nombre_titular : nombre_titular,
                banco_titular : banco_titular,
                email_titular : email_titular,
                tipo_cuenta : tipo_cuenta,
                numero_cuenta : numero_cuenta,
                rut_representante : rut_representante,
                nombre_representante : nombre_representante,
                id : id,
                _token: CSRF_TOKEN
            }

            let url = "{{ route('adm_cm.editar_cuenta_bancaria_institucion') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                    })
                    .done(function(response) {
                        console.log(response);
                        if (response.estado == 1) {
                            swal({
                                title: "Cuenta Bancaria editada correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                Danger: true,
                            });
                            $('#contenedor_cuentas_bancarias').empty();
                            $('#contenedor_cuentas_bancarias').html(response.v);
                        } else {
                            swal({
                                title: response.msj,
                                icon: "error",
                                buttons: "Aceptar",
                                Danger: true,
                            });
                        }
                    })
                    .fail(function(error) {
                        console.log("error "+error.responseText);
                    })
        }
        /*-Área_cm-*/
        $(document).ready(function() {
            {{--  $('#area_cm').DataTable({
                responsive: true
            });  --}}
        });

        /*-Especialidades_cm-*/
        $(document).ready(function() {
            {{--  $('#especialidades_cm').DataTable({
                responsive: true
            });  --}}
        });

        /*-Asistentes_cm-*/
        $(document).ready(function() {
            $('#asistentes_cm').DataTable({
                responsive: true
            });
            $(".js-example-basic-multiple").select2();
        });

        /*-Horarios_cm-*/
        $(document).ready(function() {
            $('#horarios_cm').DataTable({
                responsive: true
            });
        });

        /*-CENTRO MÉDICO-*/
        /*-Añadir especialidad-*/
        function ag_especialidad() {
            $('#a_especialidad').modal('show');
        }

        /*-Añadir área-*/
        function ag_area() {
            $('#a_area').modal('show');
        }

        /*-Rol-*/
        function añadir_rol() {
            $('#a_rol').modal('show');


        }

        /*-Permisos-*/
        function anadir_permisos(nombre_tipo, id_tipo, id)
        {
            let url = '{{ route("adm_cm.cargar_personal_persona") }}';
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: {
                    // _token: CSRF_TOKEN,
                    nombre_tipo : nombre_tipo,
                    id_tipo : id_tipo,
                    id : id,
                    id_lugar_atencion : '',
                },
            })
            .done(function(response) {

                if (response.estado == 1)
                {
                    $('#personal_id_persona').val(id);
                    $('#personal_id_personal').val(response.registro.rut);
                    $('#personal_id_lugar_atencion').val('');
                    $('#personal_desha_rut').html(response.registro.rut);
                    $('#personal_desha_rut').html(response.registro.rut);
                    $('#personal_desha_nombre').html(response.registro.nombres +' '+ response.registro.apellido_uno + ' ' + response.registro.apellido_dos);
                    $('#personal_desha_rol').html(response.registro.asistente_tipo.nombre);
                    $('#personal_desha_correo').html(response.registro.email);
                    $('#personal_desha_clave').html(response.registro.asistente_lugar.token);
                    $('#personal_desha_clave_id').val(response.registro.asistente_lugar.id);

                    $('#personal_desha_clave_edit').val(response.registro.asistente_lugar.token);
                    $('#personal_desha_clave_id_edit').val(response.registro.asistente_lugar.id);
                    $('#personal_tipo_personal_edit').val(nombre_tipo);

                    $('#permisos_rol').modal('show');

                }
                else
                {
                    swal({
                        title: "Error al Cargar Informacion de Personal",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    })
                }
            })
            .fail(function() {
                console.log("error");
            });
        }

        function cambiarContrasenalugarAtencion()
        {
            var id_persona = $('#personal_id_persona').val();
            var id_personal = $('#personal_id_personal').val();
            var id_lugar_atencion = $('#personal_id_lugar_atencion').val();
            var desha_clave_edit = $('#personal_desha_clave_edit').val();
            var desha_clave_id_edit = $('#personal_desha_clave_id_edit').val();
            var tipo_personal = $('#personal_tipo_personal_edit').val();

            let url = '{{ route("adm_cm.actualizar_acceso_personal") }}';
            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: CSRF_TOKEN,
                    tipo_personal : tipo_personal,
                    id_persona : id_persona,
                    id_personal : id_personal,
                    id_lugar_atencion : id_lugar_atencion,
                    clave : desha_clave_edit,
                    id_edit : desha_clave_id_edit,
                },
            })
            .done(function(response) {

                if (response.estado == 1)
                {
                    $('#permisos_rol').modal('hide');
                    swal({
                        title: "Clave de personal Actualizada",
                        icon: "success",
                        buttons: "Aceptar",
                    });
                }
                else
                {
                    swal({
                        title: "Error al Cargar Informacion de Personal",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
            .fail(function() {
                console.log("error");
            });
        }


        /*-SUCURSALES-*/
        /*-Agregar sucursal-*/
        function ag_sucursal() {
            $('#a_sucursal').modal('show');
        }
        /*-Editar sucursal-*/
        function ed_sucursal() {
            $('#e_sucursal').modal('show');
        }

        /*-Asistentes de sucursal-*/
        function asis_sucursal() {
            $('#asistentes_sucursal').modal('show');
        }

        /*-Horario sucursal -*/
        function hor_sucursal() {
            $('#horario_sucursal').modal('show');
        }

        /** PERFIL DE LA INSTITUCION */
        /** DATOS */
        function editar_datos_institucion()
        {

            let id_institucion = $('#id_institucion').val();
            let rut = $('#editar_rut').val();
            let razon_social = $('#editar_razon_social').val();
            let nombre = $('#editar_nombre').val();
            let certificado_supersalud = $('#editar_certificado_supersalud').val();
            let tipo_institucion = $('#tipo_institucion').val();
            let url = "{{ route('adm_cm.editar_datos_perfil') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_institucion : id_institucion,
                            rut : rut,
                            razon_social : razon_social,
                            nombre : nombre,
                            certificado_supersalud : certificado_supersalud,
                            tipo_institucion : tipo_institucion,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de la Institución editado correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            setTimeout(function() {
                                location.reload()
                            }, 100);


                        } else {
                            swal({
                                title: "Error al Editar los datos de la Institución",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                        }


                    })
                    .fail(function() {
                        console.log("error");
                    });
        }

         /** CONTACTO */
        function editar_contacto_institucion()
        {
            let id_institucion = $('#id_institucion').val();
            let tipo_institucion = $('#tipo_institucion').val();
            let email = $('#editar_email').val();
            let telefono = $('#editar_telefono').val();
            let whatsapp = $('#editar_whatsapp').val();
            let sitio_web = $('#editar_sitio_web').val();
            let url = "{{ route('adm_cm.editar_datos_perfil') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_institucion : id_institucion,
                            tipo_institucion : tipo_institucion,
                            email : email,
                            telefono : telefono,
                            whatsapp : whatsapp,
                            sitio_web : sitio_web,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de Contacto de la Institución editados correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                            setTimeout(function() {
                                location.reload()
                            }, 100);


                        } else {
                            swal({
                                title: "Error al Editar los contactos de la Institución",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });

                        }
                    })
                    .fail(function() {
                        console.log("error");
                    });
        }


        /** DIRECCON */
        function editar_direccion_institucion()
        {
            let id_institucion = $('#id_institucion').val();
            let tipo_institucion = $('#tipo_institucion').val();
            let region = $('#editar_region').val();
            let ciudad = $('#editar_ciudad').val();
            let direccion = $('#editar_direccion').val();
            let numero_dir = $('#editar_numero_dir').val();
            let sucursal_val = $('#editar_sucursal').prop('checked')
            var sucursal = 0;
            if(sucursal_val)
                sucursal = 1;
            let url = "{{ route('adm_cm.editar_datos_perfil') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_institucion : id_institucion,
                            tipo_institucion : tipo_institucion,
                            region : region,
                            ciudad : ciudad,
                            direccion : direccion,
                            numero_dir : numero_dir,
                            sucursales : sucursal,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de Ubicación de la Institución editados correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            setTimeout(function() {
                                location.reload()
                            }, 100);
                        } else {
                            swal({
                                title: "Error al Editar la Ubicación de la Institución",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
        }


        /** PERFIL RESPONSABLE */
        function editar_responsable_datos_personales()
        {

            let id_responsable = $('#id_responsable').val();
            let rut = $('#perfil_rut').val();
            let nombre = $('#perfil_nombre').val();
            let apellido_uno = $('#perfil_apellido_uno').val();
            let apellido_dos = $('#perfil_apellido_dos').val();
            let sexo = $('input:radio[name=perfil_sexo]:checked').val();
            let nac = $('#perfil_nac').val();
            let url = "{{ route('adm_cm.editar_datos_perfil_responsable') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_responsable:id_responsable,
                            rut:rut,
                            nombres:nombre,
                            apellido_uno:apellido_uno,
                            apellido_dos:apellido_dos,
                            sexo:sexo,
                            fecha_nac:nac,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de Datos del Representante editados correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            setTimeout(function() {
                                location.reload()
                            }, 100);
                        } else {
                            swal({
                                title: "Error al Editar los Datos del Representante",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
        }

        function editar_responsable_datos_contacto()
        {
            let id_responsable = $('#id_responsable').val();
            let email = $('#Perfil_email').val();
            let fono = $('#Perfil_fono').val();
            let fono_dos = $('#Perfil_fono_dos').val();
            let url = "{{ route('adm_cm.editar_datos_perfil_responsable') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_responsable:id_responsable,
                            email:email,
                            telefono_uno:fono,
                            telefono_dos:fono_dos,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de Datos de contacto del Representante editados correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            setTimeout(function() {
                                location.reload()
                            }, 100);
                        } else {
                            swal({
                                title: "Error al Editar los Datos de contacto del Representante",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
        }

        function editar_responsable_datos_residencia()
        {
            let id_responsable = $('#id_responsable').val();
            let region = $('#perfil_region').val();
            let ciudad = $('#perfil_ciudad').val();
            let dire = $('#perfil_dire').val();
            let numero_dir = $('#perfil_numero_dir').val();
            let url = "{{ route('adm_cm.editar_datos_perfil_responsable') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _token: CSRF_TOKEN,
                            id_responsable:id_responsable,
                            region: region,
                            ciudad: ciudad,
                            direccion: dire,
                            numero_dir: numero_dir,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            swal({
                                title: "Datos de Datos de Residencia del Representante editados correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            setTimeout(function() {
                                location.reload()
                            }, 100);
                        } else {
                            swal({
                                title: "Error al Editar los Datos de Residencia del Representante",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })
        }

        /** buscar ciudad */
        function buscar_ciudad(id_ciudad=0) {

            let region = $('#editar_region').val();
            let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
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

                        let ciudades = $('#editar_ciudad');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        if(id_ciudad != 0)
                            ciudades.val(id_ciudad);

                    } else {

                        swal({
                            title: "Error",
                            text: "Error al cargar las ciudades",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });


        };

        function buscar_ciudad_responsable(id_ciudad=0) {

            let region = $('#perfil_region').val();
            let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
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
                        ciudades.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        if(id_ciudad != 0)
                            ciudades.val(id_ciudad);

                    } else {

                        swal({
                            title: "Error",
                            text: "Error al cargar las ciudades",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        };

        function buscar_ciudad_nuevo_empleado(id_ciudad=0) {


            let region = $('#add_empleado_region').val();
            let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
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

                        let ciudades = $('#add_empleado_ciudad');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })

                        if(id_ciudad != 0)
                            ciudades.val(id_ciudad);

                    } else {

                        swal({
                            title: "Error",
                            text: "Error al cargar las ciudades",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });


        };

        function registrar_nuevo_empleado(){
            var valido = 1;
            var mensaje = '';
            let id_institucion = $('#add_empleado_id_institucion').val();
            let id_lugar_atencion = $('#add_empleado_id_lugar_atencion').val();
            let id_admin_creador = $('#add_empleado_id_admin_creador').val();
            let id_tipo_admin_creador = $('#add_empleado_id_tipo_admin_creador').val();
            let tipo_contrato = $('#add_empleado_tipo_contrato').val();
            let rut = $('#add_empleado_rut').val();
            let nombre = $('#add_empleado_nombre').val();
            let apellido_uno = $('#add_empleado_apellido_uno').val();
            let apellido_dos = $('#add_empleado_apellido_dos').val();
            let email = $('#add_empleado_email').val();
            let telefono = $('#add_empleado_telefono').val();
            let region = $('#add_empleado_region').val();
            let ciudad = $('#add_empleado_ciudad').val();
            let direccion = $('#add_empleado_direccion').val();
            let numero = $('#add_empleado_numero').val();
            let dias_laborales = $('#add_empleado_dias_laborales').val();
            let hora_entrada = $('#add_empleado_hora_entrada').val();
            let hora_salida = $('#add_empleado_hora_salida').val();
            let hora_entrada_colacion = $('#add_empleado_hora_entrada_colacion').val();
            let hora_salida_colacion = $('#add_empleado_hora_salida_colacion').val();
            let clave_ingreso = $('#add_empleado_clave_ingreso').val();

            if(id_institucion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Institución\n';
            }
            if(id_lugar_atencion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Lugar Atención\n';
            }
            if(id_admin_creador == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Usuario Creador\n';
            }
            if(id_tipo_admin_creador == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Tipo Usuario Creador\n';
            }
            if(tipo_contrato == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Tipo Contrato\n';
            }
            if(rut == '')
            {
                valido = 0;
                mensaje += 'Campo requerido RUT\n';
            }
            if(nombre == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Nombre\n';
            }
            if(apellido_uno == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Apellido Paterno\n';
            }
            if(apellido_dos == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Apellido Materno\n';
            }
            if(email == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Email\n';
            }
            if(telefono == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Teléfono\n';
            }
            if(region == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Región\n';
            }
            if(ciudad == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Ciudad\n';
            }
            if(direccion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Dirección\n';
            }
            if(numero == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Número\n';
            }
            if(dias_laborales == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Días laborales\n';
            }
            if(hora_entrada == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Hora entrada\n';
            }
            if(hora_salida == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Hora salida\n';
            }
            if(hora_entrada_colacion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Hora entrada colación\n';
            }
            if(hora_salida_colacion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Hora salida colación\n';
            }
            if(clave_ingreso == '')
            {
                valido = 0;
                mensaje += 'Campo requerido clave_ingreso\n';
            }

            if(valido == 1)
            {
                let url = "{{ route('adm_cm.registrar_personal') }}";
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
                        if(data.estado == 1)
                        {

                        }
                        else
                        {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar personal",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar personal",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

            }
            else
            {
                swal({
                    title: "Campos requeridos",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        }

        function agregar_cuenta_bancaria(){
            let rut_titular = $('#rut_titular_nuevo').val();
            let nombre_titular = $('#nombre_titular_nuevo').val();
            let banco_titular = $('#banco_titular_nuevo').val();
            let email_titular = $('#email_titular_nuevo').val();
            let tipo_cuenta = $('#tipo_cuenta_nuevo').val();
            let numero_cuenta = $('#numero_cuenta_nuevo').val();
            let rut_representante = $('#rut_representante_nuevo').val();
            let nombre_representante = $('#nombre_representante_nuevo').val();

            let valido = 1;
            let mensaje = '';

            if(rut_titular == ''){
                mensaje += "Debe ingresar rut<br>";
                valido = 0;
            }

            if(nombre_titular == ''){
                mensaje += "Debe ingresar nombre<br>";
                valido = 0;
            }

            if(banco_titular == 0){
                mensaje += "Debe seleccionar un banco<br>";
                valido = 0;
            }

            if(email_titular == ''){
                mensaje += "Debe ingresar email<br>";
                valido = 0;
            }

            if(tipo_cuenta == 0){
                mensaje += "Debe seleccionar un tipo de cuenta<br>";
                valido = 0;
            }

            if(numero_cuenta == ''){
                mensaje += "Debe ingresar numero de cuenta<br>";
                valido = 0;
            }

            if(valido == 0){
                swal({
                    title:'Error',
                    content: {
                        element: "div",
                        attributes: {
                            innerHTML: mensaje
                        },
                    },
                    icon:'error'
                });

                return;
            }

            let data = {
                rut_titular : rut_titular,
                nombre_titular : nombre_titular,
                banco_titular : banco_titular,
                email_titular : email_titular,
                tipo_cuenta : tipo_cuenta,
                numero_cuenta : numero_cuenta,
                rut_representante : rut_representante,
                nombre_representante : nombre_representante,
                _token: CSRF_TOKEN
            }

            let url = "{{ route('adm_cm.agregar_cuenta_bancaria_institucion') }}";

            $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: data,
                    })
                    .done(function(response) {
                        console.log(response);
                        if (response.estado == 1) {
                            swal({
                                title: "Cuenta Bancaria agregada correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                Danger: true,
                            });
                            $('#contenedor_cuentas_bancarias').empty();
                            $('#contenedor_cuentas_bancarias').html(response.v);
                        } else {
                            swal({
                                title: response.msj,
                                icon: "error",
                                buttons: "Aceptar",
                                Danger: true,
                            });
                        }
                        // cerrar modal
                        $('#modalAgregarCuentaInst').modal('hide');
                    })
                    .fail(function(error) {
                        console.log("error "+error.responseText);
                    })

        }

    </script>

    <script>
        function formatoRut(rut)
        {
            var valor = rut.value.replace('.','');
            valor = valor.replace('-','');
            cuerpo = valor.slice(0,-1);
            dv = valor.slice(-1).toUpperCase();
            rut.value = cuerpo + '-'+ dv

            if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

            suma = 0;
            multiplo = 2;

            for(i=1;i<=cuerpo.length;i++)
            {
                index = multiplo * valor.charAt(cuerpo.length - i);
                suma = suma + index;
                if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
            }

            dvEsperado = 11 - (suma % 11);
            dv = (dv == 'K')?10:dv;
            dv = (dv == 0)?11:dv;

            if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

            rut.setCustomValidity('');
        }

        function eliminar_cuenta_bancaria(id){
            swal({
                        title: "Eliminar Cuenta Bancaria",
                        text: "¿Está seguro de eliminar la cuenta bancaria?",
                        icon: "warning",
                        buttons: ["Cancelar", "Eliminar"],
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            confirmar_eliminar_cuenta_bancaria(id);
                        } else {
                            console.log('nada');
                        }
                    });

        }

        function confirmar_eliminar_cuenta_bancaria(id){
            let url = "{{ route('adm_cm.eliminar_cuenta_bancaria_institucion') }}";
            let data = {
                id : id,
                _token: CSRF_TOKEN
            }

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: data,
            })
            .done(function(response) {
                console.log(response);
                if (response.estado == 1) {
                    swal({
                        title: "Cuenta Bancaria eliminada correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        Danger: true,
                    });
                    $('#contenedor_cuentas_bancarias').empty();
                    $('#contenedor_cuentas_bancarias').html(response.v);
                } else {
                    swal({
                        title: response.msj,
                        icon: "error",
                        buttons: "Aceptar",
                        Danger: true,
                    });
                }
            })
            .fail(function(error) {
                console.log("error "+error.responseText);
            });
        }
    </script>
@endsection
