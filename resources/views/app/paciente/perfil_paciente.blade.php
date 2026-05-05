@extends('template.paciente.template')
@section('content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <!--<h5 class="font-weight-bolder">Editar perfil</h5>-->
                            </div>
                            <ul class="breadcrumb mb-4">
                                <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('paciente.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Mi cuenta</a>
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
                                    <input type="file" id="foto_perfil_input" accept="image/png,image/jpeg,image/jpg,image/webp" class="d-none">
                                    <div class="dropdown w-auto d-inline-block">
                                        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <div class="profile-dp">
                                                <div class="position-relative d-inline-block">
                                                    <img
                                                        class="img-radius img-fluid wid-100 patient-profile-photo"
                                                        id="patient-profile-image"
                                                        src="{{ $paciente->foto_perfil ? asset('storage/' . $paciente->foto_perfil) : asset('images/iconos/usuario.svg') }}"
                                                        alt="Imagen de perfil">
                                                </div>
                                                <div class="overlay">
                                                    <span>Actualizar</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="seleccionar_foto_perfil(); return false;"><i class="feather icon-upload-cloud mr-2"></i>Cambiar imagen de perfil</a>
                                            <a class="dropdown-item" href="javascript:void(0)" onclick="eliminar_foto_perfil(); return false;"><i class="feather icon-trash-2 mr-2"></i>Eliminar imagen</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-md-2 m-0">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-1" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="personal-tab" data-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="true"><i class="feather icon-user"></i> Mi perfil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="seguridad-tab" data-toggle="tab" href="#seguridad" role="tab" aria-controls="seguridad" aria-selected="false"><i class="feather icon-lock"></i> Seguridad</a>
                                    </li>
                                    <!--<li class="nav-item">
                                        <a class="nav-link text-reset" id="emergencia-tab" data-toggle="tab" href="#facturacion" role="tab" aria-controls="facturacion" aria-selected="false"><i class="feather icon-credit-card"></i> Plan y facturación</a>
                                    </li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="tab-content" id="myTabContent">
                        <!--MI PERFIL-->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header-new d-flex align-items-center justify-content-between">
                                            <h5 class="mb-0"><i class="feather icon-user icono-purple"></i> Mi perfil</h5>
                                            <button type="button" class="btn btn-outline-purple btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <div class="card-body info_basica collapse show" id="info_basica-1">
                                            <form>
                                                <!--INFO PERSONAL-->
                                                <div class="form-row mb-4">
                                                    <div class="col-12">
                                                        <h6 class="titulo-sm">Información personal</h6>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2">
                                                        <label class="font-weight-bolder ml-0 mb-0">RUT</label>
                                                        <div> {{ $paciente->rut }} </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2">
                                                        <label class="font-weight-bolder ml-0 mb-0">Nombre</label>
                                                        <div> {{ $paciente->nombres }} </div>
                                                    </div>
                                     
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2">
                                                        <label class="font-weight-bolder ml-0 mb-0">Primer
                                                        Apellido</label>
                                                        <div> {{ $paciente->apellido_uno }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2">
                                                        <label class="font-weight-bolder ml-0 mb-0">Segundo
                                                        Apellido</label>
                                                        <div> {{ $paciente->apellido_dos }}
                                                        </div>
                                                    </div>
                                           
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2">
                                                        <label class="font-weight-bolder ml-0 mb-0">Sexo</label>
                                                        <div>
                                                            @if ($paciente->sexo == 'F')
                                                                Mujer
                                                            @elseif ($paciente->sexo == 'M')
                                                                Hombre
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2">
                                                        <label class="font-weight-bolder ml-0 mb-0">Nacimiento</label>
                                                        <div>
                                                            {{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('d-m-Y') }}
                                                        </div>
                                                    </div>
                                                </div>
 
                                                <!--CONTACTO-->
                                                <div class="form-row mb-4">
                                                     <div class="col-12">
                                                        <h6 class="titulo-sm">Contacto</h6>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                                                        <label class="font-weight-bolder ml-0 mb-0">Correo electrónico</label>
                                                        <div>{{ $paciente->email }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                                                        <label class="font-weight-bolder ml-0 mb-0">Celular</label>
                                                        <div>{{ $paciente->telefono_uno }}</div>
                                                    </div>
                                                </div>
                                                <!--RESIDENCIA-->
                                                <div class="form-row">
                                                    <div class="col-12">
                                                        <h6 class="titulo-sm">Residencia</h6>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-3">
                                                        <label class="font-weight-bolder ml-0 mb-0">Dirección</label>
                                                        <div>
                                                            @if ($direccion_paciente)
                                                                {{ $direccion_paciente->direccion }} {{ $direccion_paciente->numero_dir }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                        <label class="font-weight-bolder ml-0 mb-0">Región</label>
                                                        <div>{{ $direccion_txt_region_paciente }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                                        <label class="font-weight-bolder ml-0 mb-0">Comuna</label>
                                                        <div>{{ $direccion_txt_ciudad_paciente }}</div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                       
                                        <!--Cierre: Datos Personales-->
                                        <!--(Editar)Datos Personales-->
                                        <div class="card-body info_basica collapse" id="pinfo_basica_2">
                                            <form>
                                                <div class="form-row mb-3">
                                                    <div class="col-12">
                                                        <h6 class="titulo-sm mb-4">Información personal</h6>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                                                        <label class="floating-label-activo">RUT</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Rut" id="perfil_rut" name="perfil_rut" value="{{ $paciente->rut }}" disabled>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                                                        <label class="floating-label-activo">Nombre</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Nombre" id="perfil_nombre" name="perfil_nombre" value="{{ $paciente->nombres }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                                                        <label class="floating-label-activo">Primer Apellido</label>
                                                        <input type="text" class="form-control form-control-sm" id="perfil_apellido_uno" name="perfil_apellido_uno" placeholder="Primer Apellido" value="{{ $paciente->apellido_uno }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                                                        <label class="floating-label-activo">Segundo Apellido</label>
                                                        <input type="text" class="form-control form-control-sm" id="perfil_apellido_dos" name="perfil_apellido_dos" placeholder="Segundo Apellido" value="{{ $paciente->apellido_dos }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-2 pt-2">
                                                        <label class="floating-label-activo">Sexo</label>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="perfil_sexo" name="perfil_sexo" value="M" @if ($paciente->sexo == 'M') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="perfil_sexo" name="perfil_sexo" value="F" @if ($paciente->sexo == 'F') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                                                        <label class="floating-label-activo">Nacimiento</label>
                                                        <input type="date" class="form-control form-control-sm" id="perfil_nac" name="perfil_nac" value="{{ $paciente->fecha_nac }}">
                                                    </div>
                                                </div>
     
                                                
                                                <div class="form-row mb-3">
                                                    <div class="col-12">
                                                        <h6 class="titulo-sm mb-4">Contacto</h6>
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                                                        <label class="floating-label-activo">Correo electrónico</label>
                                                        <input type="text" class="form-control form-control-sm" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{ $paciente->email }}">
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-3 col-xxl-2">
                                                        <label class="floating-label-activo">Celular</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{ $paciente->telefono_uno }}">
                                                    </div>
                                                </div>
                                         
                                         
                                                <div class="form-row mb-3">
                                                    <div class="col-12">
                                                        <h6 class="titulo-sm mb-4">Residencia</h6>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-5">
                                                        <label class="floating-label-activo">Dirección</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{ $paciente->Direccion()->first()->direccion }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-1">
                                                        <label class="floating-label-activo">Nº</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{ $paciente->Direccion()->first()->numero_dir }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                        <label class="floating-label-activo">Región</label>
                                                        <select class="form-control form-control-sm" onchange="buscar_ciudad();" id="perfil_region" name="perfil_region">
                                                            <option value="">Seleccione</option>
                                                            @if (isset($regiones))
                                                                @foreach ($regiones as $region)
                                                                    @if ( !empty($direccion_id_region_paciente) )
                                                                        <option value="{{ $region->id }}" @if ($region->id == $direccion_id_region_paciente) selected @endif>
                                                                            {{ $region->nombre }}
                                                                        </option>
                                                                    @else
                                                                        <option value="{{ $region->id }}" >
                                                                            {{ $region->nombre }}
                                                                        </option>
                                                                    @endif

                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                                                        <label class="floating-label-activo">Ciudad</label>
                                                        <select class="form-control form-control-sm" id="perfil_ciudad" name="perfil_ciudad">
                                                            <option value="">Seleccione su comuna</option>
                                                            @if (isset($ciudades))
                                                                @foreach ($ciudades as $ciudad)
                                                                    @if (!empty($direccion_id_ciudad_paciente))
                                                                        <option value="{{ $ciudad->id }}" @if ($ciudad->id == $direccion_id_ciudad_paciente) selected @endif>
                                                                            {{ $ciudad->nombre }}
                                                                        </option>
                                                                    @else
                                                                        <option value="{{ $ciudad->id }}">
                                                                            {{ $ciudad->nombre }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                            
                                                    
                                                </div>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-sm btn-danger mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                                        <button type="submit" class="btn btn-sm btn-info"><i class="feather icon-save"></i> Guardar cambios</button>
                                                    </div>
                                     
                                                </div>
                              
                                            </form>
                                        </div>
                                        <!--Cierre: (Editar)Datos Personales-->
                                    </div>
                                    <!--Cierre: Card Datos Personales-->
                                </div>
                                {{--<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <!--Card Contacto-->
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-primary">
                                            <h5 class="mb-0 text-white">Contacto</h5>
                                            <button type="button" class="btn btn-light btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Contacto-->
                                        <div class="card-body info_contacto collapse show" id="info_contacto_1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Correo electrónico</label>
                                                        <div>{{ $paciente->email }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Teléfono</label>
                                                        <div>{{ $paciente->telefono_uno }}</div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Contacto-->
                                        <!--(Editar) Contacto-->
                                        <div class="card-body info_contacto collapse " id="info_contacto_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Correo electrónico</label>
                                                        <input type="text" class="form-control form-control-sm" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{ $paciente->email }}">
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Teléfono</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{ $paciente->telefono_uno }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-danger-light-c btn-sm mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                                        <button type="button" onclick="editar_paciente_datos_contacto()" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--(Editar) Contacto-->
                                    </div>
                                    <!--Cierre: Card Contacto-->
                                    <!--Card Residencia-->
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-primary">
                                            <h5 class="mb-0 text-white">Residencia</h5>
                                            <button type="button" class="btn btn-light btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_residencial" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Residencia-->
                                        <div class="card-body info_residencial collapse show" id="info_residencial_1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Región</label>
                                                        <div>{{ $direccion_txt_region_paciente }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Comuna</label>
                                                        <div>{{ $direccion_txt_ciudad_paciente }}</div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <label class="font-weight-bolder ml-0 mb-0">Dirección</label>
                                                        <div>
                                                            @if ($direccion_paciente)
                                                                {{ $direccion_paciente->direccion }} {{ $direccion_paciente->numero_dir }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Residencia-->
                                        <!--(Editar) Residencia-->
                                        <div class="card-body border-top info_residencial collapse " id="info_residencial_2">
                                            <form action="{{ ROUTE('paciente.perfil.editdirec') }}" method="GET">
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Región</label>
                                                        <select class="form-control form-control-sm" onchange="buscar_ciudad();" id="perfil_region" name="perfil_region">
                                                            <option value="">Seleccione</option>
                                                            @if (isset($regiones))
                                                                @foreach ($regiones as $region)
                                                                    @if ( !empty($direccion_id_region_paciente) )
                                                                        <option value="{{ $region->id }}" @if ($region->id == $direccion_id_region_paciente) selected @endif>
                                                                            {{ $region->nombre }}
                                                                        </option>
                                                                    @else
                                                                        <option value="{{ $region->id }}" >
                                                                            {{ $region->nombre }}
                                                                        </option>
                                                                    @endif

                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo">Ciudad</label>
                                                        <select class="form-control form-control-sm" id="perfil_ciudad" name="perfil_ciudad">
                                                            <option value="">Seleccione su comuna</option>
                                                            @if (isset($ciudades))
                                                                @foreach ($ciudades as $ciudad)
                                                                    @if (!empty($direccion_id_ciudad_paciente))
                                                                        <option value="{{ $ciudad->id }}" @if ($ciudad->id == $direccion_id_ciudad_paciente) selected @endif>
                                                                            {{ $ciudad->nombre }}
                                                                        </option>
                                                                    @else
                                                                        <option value="{{ $ciudad->id }}">
                                                                            {{ $ciudad->nombre }}
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                        <label class="floating-label-activo">Dirección</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{ $paciente->Direccion()->first()->direccion }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="floating-label-activo">Nº</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{ $paciente->Direccion()->first()->numero_dir }}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-danger-light-c btn-sm mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                                        <button type="button" onclick="editar_paciente_datos_residencia();" class="btn btn-info-light-c btn-sm"><i class="feather icon-save"></i> Guardar cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--(Editar) Residencia-->
                                    </div>
                                    <!--Cierre: Card Residencia-->
                                </div>--}}
                            </div>
                        </div>
                        <!--CIERRE: MI PERFIL-->

                        <!--SEGURIDAD-->
                        <div class="tab-pane fade" id="seguridad" role="tabpanel" aria-labelledby="seguridad-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-n3">
                                    <ul class="nav nav-tabs-secciones-info" id="seguridad_paciente" role="tablist">
                                        <li class="nav-item-secciones-info">
                                            <a class="nav-secciones-info text-uppercase active" id="p-director-tab" data-toggle="tab" href="#p-director" role="tab" aria-controls="p-director" aria-selected="true">Contraseña</a>
                                        </li>
                                        <!--<li class="nav-item-secciones-info">
                                            <a class="nav-secciones-info text-uppercase" id="d-activo-tab" data-toggle="tab" href="#d-activo" role="tab" aria-controls="d-activo" aria-selected="false">-</a>
                                        </li>-->
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content" id="seguridad_paciente">
                                        <div class="tab-pane fade show active" id="pass" role="tabpanel" aria-labelledby="pass-tab">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    <!--CARD CONTRASEÑA PERSONAL-->
                                                    <div class="card">
                                                        <div class="card-header-new d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0"><i class="feather icon-lock icono-purple"></i> Contraseña</h5>
                                                            <button type="button" class="btn btn-outline-purple btn-icon m-0 float-right" data-toggle="collapse" data-target=".pass_personal" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                                                                <i class="feather icon-edit"></i>
                                                            </button>
                                                        </div>
                                                        <!--CONTRASEÑA PERSONAL-->
                                                        <div class="card-body pass_personal collapse show" id="pass_personal_1">
                                                            <form >
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="font-weight-bolder ml-0 mb-0">Contraseña actual</label>
                                                                        <div> •••••••• </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--CIERRE: CONTRASEÑA PERSONAL-->
                                                        <!--(EDITAR)CONTRASEÑA PERSONAL-->
                                                        <div class="card-body border-top pass_personal collapse" id="pass_personal_2">
                                                            <form method="get" action="{{ route('perfil.cambio_contrasena')}}">
                                                                @csrf
                                                                <input type="hidden" name="contrasena_mail" id="contrasena_mail" value="{{ Auth::user()->email }}">
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo">Contraseña actual</label>
                                                                        <input type="text" class="form-control form-control-sm" id="contrasena_actual" name="contrasena_actual">
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo">Nueva contraseña</label>
                                                                        <input type="text" class="form-control form-control-sm" id="password_registro" name="password_registro">
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo">Repita nueva contraseña</label>
                                                                        <input type="text" class="form-control form-control-sm" id="password_confirmacion_registro" name="password_confirmacion_registro">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                                                                        <button type="button" class="btn btn-sm btn-danger mr-2"><i class="feather icon-x"></i> Cancelar</button>
                                                                        <button type="submit" class="btn btn-sm btn-info"><i class="feather icon-save"></i> Guardar cambios</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--CIERRE: (EDITAR)CONTRASEÑA PERSONAL-->
                                                    </div>
                                                    <!--CIERRE: CARD CONTRASEÑA PERSONAL-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: SEGURIDAD-->

                        <!--PLAN Y FACTURACIÓN-->
                        <div class="tab-pane fade" id="facturacion" role="tabpanel" aria-labelledby="facturacion-tab">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
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
                                                        <table id="contactos_emergencia" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">

                                                            @if ($contacto != null)
                                                                <thead>
                                                                    <tr>
                                                                        <th>Prioridad</th>
                                                                        <th>Nombre</th>
                                                                        <th>Parentesco</th>
                                                                        <th>Acción</th>
                                                                    </tr>
                                                                </thead>

                                                                @foreach ($contacto as $c)
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="align-middle">
                                                                                {{ $c->prioridad }}
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                {{ $c->nombre }}
                                                                                <br>{{ $c->apellido_uno . ' ' . $c->apellido_dos }}
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                {{ $c->parentezco }}
                                                                            </td>
                                                                            <td class="align-middle">

                                                                                <button id="btn_info_contacto" onclick="cargar_datos_contacto({{ $c->id }})" class="btn btn-info btn-icon" data-toggle="modal" data-target="#info_contacto_emergencia" title="Información de contacto" data-placement="top"><i class="feather icon-phone-call"></i>
                                                                                </button>

                                                                                <button id="btn_editar_contacto" onclick="cargar_datos_contacto({{ $c->id }})" class="btn btn-warning btn-sm btn-icon" data-toggle="modal" data-target="#editar_contacto_emergencia" title="Editar contacto" data-placement="top"><i class="feather icon-edit"></i>
                                                                                </button>
                                                                                <button class="btn btn-danger btn-sm btn-icon" onclick="eliminar_contacto_paciente({{ $c->id . ',' . $paciente->id }})" data-toggle="tooltip" title="Eliminar contacto"><i class="feather icon-x"></i>
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
                        <!--CIERRE: PLAN Y FACTURACIÓN-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('app.paciente.modales.contacto_emergencia.agregar_contacto_emergencia')
    @include('app.paciente.modales.contacto_emergencia.informacion_contacto_emergencia')
    @include('app.paciente.modales.contacto_emergencia.editar_contacto_emergencia')


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
            $('#foto_perfil_input').on('change', function(event) {
                const archivo = event.target.files[0];

                if (!archivo) {
                    return;
                }

                if (!archivo.type.startsWith('image/')) {
                    swal({
                        title: "Foto de perfil",
                        text: "Debes seleccionar una imagen válida.",
                        icon: "error",
                    });
                    $(this).val('');
                    return;
                }

                recortar_y_subir_foto(archivo);
            });

            /* formatear rut */
            $("#rut_nuevo_contacto").rut({
                formatOn: 'keyup',
                minimumLength: 2,
                validateOn: 'change',
                useThousandsSeparator : false
            });

            $('input[name="auto_fmu"]').change(function(){
                console.log($('input[name="auto_fmu"]:checked').val());
                if($('input[name="auto_fmu"]:checked').val() == 'NO')
                {
                    $('input[name="auto_inf_turno"]').attr('disabled', false);
                    $('input[name="auto_inf_turno"][value="NO"]').prop('checked', true);
                }
                else
                {
                    $('input[name="auto_inf_turno"]').attr('disabled', true);
                    $('input[name="auto_inf_turno"][value="SI"]').prop('checked', true);
                }
            });

            // $('input[name="auto_inf_turno"]').change(function(){
            //     console.log($('input[name="auto_inf_turno"]:checked').val());
            // });

            // $('input[name="auto_inf_confd"]').change(function(){
            //     console.log($('input[name="auto_inf_confd"]:checked').val());
            // });

        });

        function seleccionar_foto_perfil() {
            $('#foto_perfil_input').trigger('click');
        }

        function recortar_y_subir_foto(archivo) {
            const lector = new FileReader();

            lector.onload = function(e) {
                const imagen = new Image();

                imagen.onload = function() {
                    const ladoOriginal = Math.min(imagen.width, imagen.height);
                    const origenX = (imagen.width - ladoOriginal) / 2;
                    const origenY = (imagen.height - ladoOriginal) / 2;
                    const ladoSalida = 512;
                    const canvas = document.createElement('canvas');

                    canvas.width = ladoSalida;
                    canvas.height = ladoSalida;

                    const contexto = canvas.getContext('2d');
                    contexto.drawImage(
                        imagen,
                        origenX,
                        origenY,
                        ladoOriginal,
                        ladoOriginal,
                        0,
                        0,
                        ladoSalida,
                        ladoSalida
                    );

                    canvas.toBlob(function(blob) {
                        if (!blob) {
                            swal({
                                title: "Foto de perfil",
                                text: "No fue posible procesar la imagen.",
                                icon: "error",
                            });
                            $('#foto_perfil_input').val('');
                            return;
                        }

                        subir_foto_perfil(blob, archivo.name || 'foto_perfil.png');
                    }, 'image/png', 0.95);
                };

                imagen.src = e.target.result;
            };

            lector.readAsDataURL(archivo);
        }

        function subir_foto_perfil(blob, nombreArchivo) {
            const formData = new FormData();
            formData.append('_token', CSRF_TOKEN);
            formData.append('foto_perfil', blob, nombreArchivo.replace(/\.[^.]+$/, '') + '.png');

            $.ajax({
                url: "{{ route('paciente.actualizar.foto') }}",
                type: "post",
                data: formData,
                processData: false,
                contentType: false,
            })
            .done(function(data) {
                if (data.estado == 1) {
                    actualizar_imagenes_perfil(data.foto_url);
                    swal({
                        title: "Foto de perfil",
                        text: data.mensaje,
                        icon: "success",
                    });
                } else {
                    swal({
                        title: "Foto de perfil",
                        text: data.mensaje || "No fue posible actualizar la foto.",
                        icon: "error",
                    });
                }
            })
            .fail(function() {
                swal({
                    title: "Foto de perfil",
                    text: "No fue posible actualizar la foto.",
                    icon: "error",
                });
            })
            .always(function() {
                $('#foto_perfil_input').val('');
            });
        }

        function eliminar_foto_perfil() {
            swal({
                title: "Eliminar imagen",
                text: "La foto actual se eliminará del perfil.",
                icon: "warning",
                buttons: ["Cancelar", "Eliminar"],
                dangerMode: true,
            }).then(function(confirmado) {
                if (!confirmado) {
                    return;
                }

                $.ajax({
                    url: "{{ route('paciente.eliminar.foto') }}",
                    type: "post",
                    data: {
                        _token: CSRF_TOKEN,
                    },
                })
                .done(function(data) {
                    if (data.estado == 1) {
                        actualizar_imagenes_perfil(data.foto_url);
                        swal({
                            title: "Foto de perfil",
                            text: data.mensaje,
                            icon: "success",
                        });
                    } else {
                        swal({
                            title: "Foto de perfil",
                            text: data.mensaje || "No fue posible eliminar la foto.",
                            icon: "error",
                        });
                    }
                })
                .fail(function() {
                    swal({
                        title: "Foto de perfil",
                        text: "No fue posible eliminar la foto.",
                        icon: "error",
                    });
                });
            });
        }

        function actualizar_imagenes_perfil(url) {
            $('#patient-profile-image').attr('src', url);
            $('#patient-menu-image').attr('src', url);
        }

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

                            console.log(data.ciudad != null);
                            console.log(data.ciudad != 'null');
                            if(data.ciudad != null && data.ciudad != 'null')
                            {

                                for (let i = 0; i < data.region.length; i++) {

                                    if (data.region[i].id == data.ciudad.id_region) {

                                        $('#region_agregar').val(data.region[i].id);
                                        buscar_ciudades();

                                    }
                                }
                                // alert(data.ciudad.id);
                                // console.log(data.ciudad.id);
                                $('#ciudad_agregar').val(data.ciudad.id);
                            }
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
                            // let ciudad = data.ciudad.id;
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
            url = "{{ route('cargar_datos_contacto') }}";
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

            let url = "{{ route('contacto_emergencia.eliminar_contacto_paciente') }}";

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
            let perfil_sexo = $('input[name="perfil_sexo"]:checked').val();
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
                        }, 2000);


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

            var valido = 1;
            var mensaje = '';

            if(perfil_dire=='')
            {
                valido = 0;
                mensaje += 'Dirección, Campo requerido.\n';
            }
            if(perfil_region=='')
            {
                valido = 0;
                mensaje += 'Región, Campo requerido.\n';
            }
            if(perfil_ciudad=='')
            {
                valido = 0;
                mensaje += 'Ciudad, Campo requerido.\n';
            }
            if(perfil_numero_dir=='')
            {
                valido = 0;
                mensaje += 'Numero, Campo requerido.\n';
            }

            if(valido == 1)
            {
                let url = "{{ ROUTE('paciente.perfil.editdirec') }}";

                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        perfil_dire: perfil_dire,
                        perfil_region: perfil_region,
                        perfil_ciudad: perfil_ciudad,
                        perfil_numero_dir: perfil_numero_dir,

                    },
                })
                .done(function(response) {

                    if (response.estado == 1)
                    {
                        swal({
                            title: "Sus datos de residencia fueron editados de forma correcta",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                        setTimeout(function() {
                            location.reload()
                        }, 4000);
                    }
                    else
                    {
                        swal({
                            title: "Error al editar sus datos de residencia",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // setTimeout(function() {
                        //     location.reload()
                        // }, 3000);
                    }
                })
                .fail(function() {
                    console.log("error");
                });
            }
            else
            {
                swal({
                    title: "Sus datos de residencia fallaron al ser editados, intente de nuevo",
                    text: mensaje,
                    icon: "error",
                });
            }
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
            let url = "{{ route('buscar_ciudad_region') }}";
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
            let url = "{{ route('buscar_ciudad_region') }}";
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
            let url = "{{ route('buscar_ciudad_region') }}";
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
            let url = "{{ route('contacto_emergencia.editar_contacto') }}";

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

        function editar_antecedentes_paciente(id) {

            let id_paciente = id;

            let edit_transfusion = $('input:radio[name=edit_transfusion]:checked').val();

            let edit_dona_sangre = $('input:radio[name=edit_dona_sangre]:checked').val();
            let editar_grupo_sanguineo = $('#editar_grupo_sanguineo').val();
            {{--  let comentarios_gruposangre = $('#comentarios_gruposangre').val();  --}}
            let edit_hepatitis = $('input:radio[name=edit_hepatitis]:checked').val();
            let comentarios_hepatitis = $('#comentarios_hepatitis').val();
            let edit_donante_total = $('input:radio[name=edit_donante_total]:checked').val();
            let edit_donante_parcial = $('input:radio[name=edit_donante_parcial]:checked').val();
            let comentarios_organo = $('#comentarios_organo').val();
            let comentarios_impedimento = $('#comentarios_impedimento').val();

            let url = "{{ route('profesional.editar_antecedentes_paciente') }}";

            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_paciente: id_paciente,
                    edit_transfusion: edit_transfusion,
                    edit_dona_sangre: edit_dona_sangre,
                    editar_grupo_sanguineo: editar_grupo_sanguineo,
                    {{--  comentarios_gruposangre: comentarios_gruposangre,  --}}
                    edit_hepatitis: edit_hepatitis,
                    comentarios_hepatitis: comentarios_hepatitis,
                    edit_donante_total: edit_donante_total,
                    edit_donante_parcial: edit_donante_parcial,
                    comentarios_organo: comentarios_organo,
                    comentarios_impedimento: comentarios_impedimento
                },
            })
            .done(function(data) {




                if (data != 'failed') {

                    swal({
                        title: "se modifico antecedentes del paciente",
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                    setTimeout(function() {
                        location.reload()
                    }, 100);
                    // alert('se modifico antecedentes del paciente');
                    // location.reload();

                } else {
                    swal({
                        title: "Error al modificar los antecedentes",
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

        function registrar_autorizaciones()
        {
            console.log($('input[name="auto_fmu"]:checked').val());
            console.log($('input[name="auto_inf_turno"]:checked').val());
            console.log($('input[name="auto_inf_confd"]:checked').val());

            var auto_fmu = $('input[name="auto_fmu"]:checked').val();
            var auto_inf_turno = $('input[name="auto_inf_turno"]:checked').val();
            var auto_inf_confd = $('input[name="auto_inf_confd"]:checked').val();

            console.log('paso 1');
            if(auto_fmu == '')
            {
                auto_fmu = 0;
            }
            else
            {
                if(auto_fmu == 'SI')
                {
                    auto_fmu = 1;
                    auto_inf_turno == 'SI';
                }
                else
                {
                    auto_fmu = 0;
                }
            }

            if(auto_inf_turno == '')
            {
                auto_inf_turno = 0;
            }
            else
            {
                if(auto_inf_turno == 'SI')
                {
                    auto_inf_turno = 1;
                }
                else
                {
                    auto_inf_turno = 0;
                }
            }

            if(auto_inf_confd == '')
            {
                auto_inf_confd = 0;
            }
            else
            {
                if(auto_inf_confd == 'SI')
                {
                    auto_inf_confd = 1;
                }
                else
                {
                    auto_inf_confd = 0;
                }
            }
            console.log('paso 2');

            let url = "{{ route('paciente.perfil.registro_autorizacion') }}";

            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    id_paciente: $('#id_paciente').val(),
                    auto_fmu: auto_fmu,
                    auto_inf_turno: auto_inf_turno,
                    auto_inf_confd: auto_inf_confd,
                },
            })
            .done(function(data) {

                console.log('paso 3');
                console.log(data);

                if(data.estado == 1)
                {
                    swal({
                        title: "Modificacion de autorizaciones",
                        text: "Actualizacion con Exito",
                        icon: "success",
                    });


                    var txt_auto_fmu = '<span class="text-success">SI</span>';
                    if(auto_fmu == 1)
                    {
                        txt_auto_fmu = '<span class="text-success">SI</span>';
                    }
                    else
                    {
                        txt_auto_fmu = '<span class="text-danger">NO</span>';
                    }
                    $('#txt_auto_fmu').html(txt_auto_fmu);

                    var txt_auto_inf_turno = '<span class="text-success">SI</span>';
                    if(auto_inf_turno == 1)
                    {
                        txt_auto_inf_turno = '<span class="text-success">SI</span>';
                    }
                    else
                    {
                        txt_auto_inf_turno = '<span class="text-danger">NO</span>';
                    }
                    $('#txt_auto_inf_turno').html(txt_auto_inf_turno);

                    var txt_auto_inf_confd = '<span class="text-success">SI</span>';
                    if(auto_inf_confd == 1)
                    {
                        txt_auto_inf_confd = '<span class="text-success">SI</span>';
                    }
                    else
                    {
                        txt_auto_inf_confd = '<span class="text-danger">NO</span>';
                    }
                    $('#txt_auto_inf_confd').html(txt_auto_inf_confd);

                    $('#rompeclave_1').show();
                    $('#rompeclave_2').hide();
                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }
                    swal({
                        title: "Modificacion de autorizaciones",
                        text: "Se presento un problema.\n"+mensaje,
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

    </script>
    <script src="{{ asset('js/tabla_contactos_emergencia.js') }}"></script>
    <script src="{{ asset('js/tooltip_contacto_emergencia.js') }}"></script>
@endsection

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('css/perfiles_usuarios.css') }}">
    <style>
        .patient-profile-photo {
            width: 100px;
            height: 100px;
            object-fit: cover;
            aspect-ratio: 1 / 1;
        }
    </style>
@endsection
