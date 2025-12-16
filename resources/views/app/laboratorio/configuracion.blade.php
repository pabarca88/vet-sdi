@extends('template.adm_cm.template')

@section('content')
<style>
    .select2-container--open{
        z-index: 9999999 !important;
    }
</style>
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="font-weight-bolder">Configurar Mi Institución {{ $institucion->nombre }}</h5>
                            </div>
                            <ul class="breadcrumb mb-4">
                                <li class="breadcrumb-item">
                                    @if($institucion->id_tipo_institucion == 3)
                                    <a href="{{ ROUTE('laboratorio.adm_general.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                    @else
                                    <a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
                                    @endif
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Configuración</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id_institucion" id="id_institucion" value="{{ $institucion->id }}">
            <input type="hidden" name="tipo_institucion" id="tipo_institucion" value="{{ $tipo_institucion }}">


            <div class="user-profile user-card mb-4">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12 text-center mt-n3">
                                <div class="change-profile text-center">
                                    <div class="dropdown w-auto d-inline-block">
                                        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <div class="profile-dp">
                                                <div class="position-relative d-inline-block">
                                                    <img class="img-radius img-fluid wid-100" id="profile-image"
                                                        src="{{ $institucion->foto_perfil ? asset('storage/' . $institucion->foto_perfil) : asset('images/iconos/cm-perfiles.png') }}"
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
                                        <!-- Input file oculto para seleccionar imagen -->
                                    <input type="file" id="foto-perfil-input" accept="image/*" style="display: none;" onchange="cambiar_foto_perfil(this)">
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
                                                            <a class="nav-link text-reset active" id="p-cm-tab" data-toggle="tab" href="#p-cm" role="tab" aria-controls="p-cm" aria-selected="false"><i class="feather icon-home mr-2"></i>Perfil de la Institución</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-reset " id="p-adm-tab" data-toggle="tab" href="#p-adm" role="tab" aria-controls="p-adm" aria-selected="true"><i class="feather icon-user mr-2"></i>Perfil administrador</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-reset" id="rol-permiso-adm-med-tab" data-toggle="tab" href="#rol-permiso-adm-med" role="tab" aria-controls="rol-permiso-adm-med" aria-selected="false"><i class="feather  icon-lock mr-2"></i>Perfil administración técnica</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-reset" id="ar-dep-tab" data-toggle="tab" href="#ar-dep" role="tab" aria-controls="ar-dep" aria-selected="false"><i class="fa-solid fa-stethoscope mr-2"></i>Especialidades y áreas</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-reset" id="bodegas_serv-tab"
                                                                data-toggle="tab" href="#bodegas_serv" role="tab"
                                                                aria-controls="bodegas_serv" aria-selected="false"><i
                                                                    class="feather icon-home mr-2"></i>Bodegas</a>
                                                        </li>
                                                        @if($institucion->sucursales == 1)
                                                            <li class="nav-item">
                                                                <a class="nav-link text-reset" id="sucursales-tab" data-toggle="tab" href="#sucursales" role="tab" aria-controls="sucursales" aria-selected="false"><i class="feather icon-home mr-2"></i>Sucursales</a>
                                                            </li>
                                                        @endif
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

                        <!--PERFIL CENTRO MEDICO-->
                        <div class="tab-pane fade show active" id="p-cm" role="tabpanel" aria-labelledby="p-cm-tab">
                            <div class="row mb-3 mt-0">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card mb-1">
                                        <div class="card-body">
                                            <h4 class="f-18 mb-0 text-info">Perfil de la Institución</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!--Datos del centro médico-->
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Datos de la Institución</h5>
                                            <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Datos Personales-->
                                        <div class="card-body info_basica collapse show" id="info_basica-1">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_rut">{{ $institucion->rut }}</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Razón social</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_razon_social">{{ $institucion->razon_social }}</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Nombre Fantasia</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_nombre">{{$institucion->nombre  }}</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Nº de inscripción SuperSalud</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_certificado_supersalud">{{ $institucion->certificado_supersalud }}</div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Datos Personales-->
                                        <!--(Editar)Datos Personales-->
                                        <div class="card-body info_basica collapse" id="pinfo_basica_2">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Rut" id="editar_rut" value="{{ $institucion->rut }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Razón Social</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Razón Social" id="editar_razon_social" value="{{ $institucion->razon_social }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Nombre Fantasia</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Nombre" id="editar_nombre" value="{{$institucion->nombre  }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Nº de inscripción SuperSalud</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Nº de inscripción" id="editar_certificado_supersalud" value="{{ $institucion->certificado_supersalud }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-sm btn-danger mr-2" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">Cancelar</button>
                                                        <button type="button" class="btn btn-sm btn-info" onclick="editar_datos_institucion();">Guardar cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: (Editar)Datos Personales-->
                                    </div>
                                    <!--Cierre: Datos del centro médico-->
                                </div>
                                <div class="col-md-6">

                                    <!--Contacto-->
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Datos de Contacto</h5>
                                            <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_contacto" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Contacto-->
                                        <div class="card-body info_contacto collapse show" id="info_contacto_1">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Correo electrónico</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_email" >{{ $institucion->email }}</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Teléfono</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_telefono" >{{ $institucion->telefono }}</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Whatsapp</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_whatsapp" >{{ $institucion->whatsapp }}</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Sitio web</label>
                                                    <div class="col-sm-7 my-auto ml-2" id="ver_sitio_web" >{{ $institucion->sitio_web }}</div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Contacto-->
                                        <!--(Editar) Contacto-->
                                        <div class="card-body info_contacto collapse" id="info_contacto_2">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Correo electrónico</label>
                                                    <div class="col-sm-7 font-weight-bolder">
                                                        <input type="text" class="form-control form-control-sm" id="editar_email" placeholder="Correo electrónico" value="{{ $institucion->email }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Teléfono</label>
                                                    <div class="col-sm-7 font-weight-bolder">
                                                        <input type="text" class="form-control form-control-sm" id="editar_telefono" placeholder="Teléfono" value="{{ $institucion->telefono }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Whatsapp</label>
                                                    <div class="col-sm-7 font-weight-bolder">
                                                        <input type="text" class="form-control form-control-sm" id="editar_whatsapp" placeholder="Whatsapp" value="{{ $institucion->whatsapp }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Sitio web</label>
                                                    <div class="col-sm-7 font-weight-bolder">
                                                        <input type="text" class="form-control form-control-sm" id="editar_sitio_web" placeholder="Sitio web" value="{{ $institucion->sitio_web }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-sm btn-danger mr-2">Cancelar</button>
                                                        <button type="button" class="btn btn-sm btn-info" onclick="editar_contacto_institucion();">Guardar cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--(Editar) Contacto-->
                                    </div>
                                    <!--Cierre: Card Contacto-->

                                    <!--Ubicación-->
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Ubicación (casa matriz)</h5>
                                            <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".info_residencial" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>

                                        <!--Ubicación-->
                                        <div class="card-body info_residencial collapse show" id="info_residencial_1">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                    <div class="col-sm-6 my-auto ml-2">
                                                        {{ $institucion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                    <div class="col-sm-6 my-auto ml-2">
                                                        {{ $institucion->Direccion()->first()->Ciudad()->first()->nombre }}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                    <div class="col-sm-6 my-auto ml-2">
                                                        {{ $institucion->Direccion()->first()->direccion . ' ' . $institucion->Direccion()->first()->numero_dir }}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Sucursales</label>
                                                    <div class="col-sm-6 my-auto ml-2">
                                                        @if($institucion->sucursales == 1)
                                                            Si Registra Sucursales
                                                        @else
                                                            No Registra Sucursales
                                                        @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Ubicación-->
                                        <!--(Editar) Ubicación-->
                                        <div class="card-body info_residencial collapse " id="info_residencial_2">
                                            <form>

                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" onchange="buscar_ciudad();" id="editar_region" name="editar_region">
                                                            <option value="">Seleccione una Región</option>
                                                            @if (isset($regiones))
                                                                @foreach ($regiones as $region)
                                                                <option value="{{ $region->id }}" @if ($region->id ==
                                                                    $institucion->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                    {{ $region->nombre }}
                                                                </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" id="editar_ciudad" name="editar_ciudad">
                                                            <option value="">Seleccione su comuna</option>
                                                            @if (isset($ciudades))
                                                                @foreach ($ciudades as $ciudad)
                                                                @if ($institucion->Direccion()->first()->id_ciudad ==  $ciudad->id)
                                                                    <option value="{{ $ciudad->id }}" selected>
                                                                @else
                                                                    <option value="{{ $ciudad->id }}" >
                                                                @endif

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
                                                        <input type="text" class="form-control" placeholder="Dirección" name="editar_direccion" id="editar_direccion" value="{{ $institucion->Direccion()->first()->direccion }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Oficina</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" placeholder="n&uacute;mero #" name="editar_numero_dir" id="editar_numero_dir" value="{{ $institucion->Direccion()->first()->numero_dir }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Sucursal</label>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                @if($institucion->sucursales == 1)
                                                                    <input type="checkbox" id="editar_sucursal" checked="checked">
                                                                @else
                                                                    <input type="checkbox" id="editar_sucursal">
                                                                @endif
                                                                <label for="editar_sucursal" class="cr"></label>
                                                                <label>SI</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label"></label>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-sm btn-danger mr-2">Cancelar</button>
                                                        <button type="button" class="btn btn-sm btn-info" onclick="editar_direccion_institucion();">Guardar cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--(Editar) Ubicación-->
                                    </div>
                                    <!--Cierre: Ubicación-->
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: PERFIL CENTRO MEDICO-->

                        <!--PERFIL ADMINISTRADOR-->
                        <div class="tab-pane fade" id="p-adm" role="tabpanel" aria-labelledby="p-adm-tab">
                            <div class="row mb-3 mt-0">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card mb-1">
                                        <div class="card-body">
                                            <h4 class="f-18 mb-0 text-info">Perfil administrador de la Institución</h4>

                                            <input type="hidden" name="id_responsable" id="id_responsable" value="{{ $responsable->id }}">
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
                                        <!--Datos Personales-->
                                        <div class="card-body border-top info_basica collapse show" id="info_basica-1">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                    <div class="col-sm-6 my-auto ml-2"> {{ $responsable->rut }} </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                                    <div class="col-sm-6 my-auto ml-2"> {{ $responsable->nombres }} </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Primer
                                                        Apellido</label>
                                                    <div class="col-sm-6 my-auto ml-2"> {{ $responsable->apellido_uno }}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Segundo
                                                        Apellido</label>
                                                    <div class="col-sm-6 my-auto ml-2"> {{ $responsable->apellido_dos }}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                    <div class="col-sm-6 my-auto ml-2">
                                                        @if ($responsable->sexo == 'F')
                                                            Mujer
                                                        @elseif ($responsable->sexo == 'M')
                                                            Hombre
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                    <div class="col-sm-6 my-auto ml-2">
                                                        {{ \Carbon\Carbon::parse($responsable->fecha_nac)->format('d-m-Y') }}
                                                    </div>
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
                                                        <input type="text" class="form-control" placeholder="Rut" id="perfil_rut" name="perfil_rut" value="{{ $responsable->rut }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" placeholder="Nombre" id="perfil_nombre" name="perfil_nombre" value="{{ $responsable->nombres }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="perfil_apellido_uno" name="perfil_apellido_uno" placeholder="Primer Apellido" value="{{ $responsable->apellido_uno }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="perfil_apellido_dos" name="perfil_apellido_dos" placeholder="Segundo Apellido" value="{{ $responsable->apellido_dos }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                    <div class="col-sm-7 my-auto">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="perfil_sexo" name="perfil_sexo" id="inlineRadio2" value="F" @if ($responsable->sexo == 'F') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="perfil_sexo" name="perfil_sexo" id="inlineRadio1" value="M" @if ($responsable->sexo == 'M') checked @endif>
                                                            <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" class="form-control" id="perfil_nac" name="perfil_nac" value="{{ $responsable->fecha_nac }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-form-label"></label>
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                        <button type="button" onclick="editar_responsable_datos_personales();" class="btn btn-info">Guardar Cambios</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: (Editar)Datos Personales-->
                                    </div>
                                    <!--Cierre: Card Datos Personales-->

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
                                                <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $responsable->Usuario()->first()->id }}">
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
                                                    <div class="col-sm-6 my-auto ml-2"> {{ $responsable->email }} </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                    <div class="col-sm-6 my-auto ml-2">{{ $responsable->telefono_uno }}</div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                    <div class="col-sm-6 my-auto ml-2">{{ $responsable->telefono_dos }}</div>
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
                                                        <input type="text" class="form-control" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{ $responsable->email }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{ $responsable->telefono_uno }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono_dos" name="Perfil_fono_dos" value="{{ $responsable->telefono_dos }}">
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
                                                        {{ $responsable->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                    <div class="col-sm-6 my-auto ml-2">
                                                        {{ $responsable->Direccion()->first()->Ciudad()->first()->nombre }}
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                    <div class="col-sm-6 my-auto ml-2">
                                                        {{ $responsable->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
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
                                                            @if (isset($regiones))
                                                                @foreach ($regiones as $region)
                                                                <option value="{{ $region->id }}" @if ($region->id ==
                                                                    $responsable->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
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
                                                                <option value="{{ $ciudad->id }}" @if ($responsable->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
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
                                                        <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{ $responsable->Direccion()->first()->direccion }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Depto</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{ $responsable->Direccion()->first()->numero_dir }}">
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
                            </div>
                        </div>

                        <div class="tab-pane fade" id="rol-permiso-adm-med" role="tabpanel" aria-labelledby="rol-permiso-adm-med-tab">
                            <div class="row mb-3 mt-0">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card mb-1">
                                        <div class="card-body">
                                            <h4 class="f-18 mb-0 text-info">Perfil administradores medicos de la Institución</h4>
                                            <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                <button type="button" class="btn btn-sm btn-info" onclick="ag_area();"><i class="feather icon-plus" aria-hidden="true"></i> Administrar</button>
                                            </div>
                                            @if(isset($director_cm) && $director_cm != null)<input type="hidden" name="id_responsable" id="id_director_cm" value="{{$director_cm->id }}"> @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="contenedor_administradores_cm">
                                <div class="row">
                                    @if(isset($director_cm) && $director_cm != null)
                                    <div class="col-md-4">
                                        <!--Card Información Básica-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Datos Personales Director Medico</h5>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_admin_cm(1,{{ $institucion->id }})"><i class="fas fa-trash"></i></button>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica_director_cm" aria-expanded="false" aria-controls="info_basica-1_ info_basica-2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Datos Personales-->
                                            <div class="card-body border-top info_basica_director_cm collapse show" id="info_basica-1_">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_cm->rut }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_cm->nombre }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Primer
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_cm->apellido_uno }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Segundo
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_cm->apellido_dos }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            @if ($director_cm->sexo == 'F')
                                                                Mujer
                                                            @elseif ($director_cm->sexo == 'M')
                                                                Hombre
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{ \Carbon\Carbon::parse($director_cm->fecha_nac)->format('d-m-Y') }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Datos Personales-->
                                            <!--(Editar)Datos Personales-->
                                            <div class="card-body border-top info_basica_director_cm collapse" id="pinfo_basica_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Rut" id="perfil_rut_medico" name="perfil_rut_medico" value="{{$director_cm->rut }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Nombre" id="perfil_nombre_medico" name="perfil_nombre_medico" value="{{$director_cm->nombre }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_uno_medico" name="perfil_apellido_uno_medico" placeholder="Primer Apellido" value="{{$director_cm->apellido_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_dos_medico" name="perfil_apellido_dos_medico" placeholder="Segundo Apellido" value="{{$director_cm->apellido_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-7 my-auto">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio2" value="F" @if ($director_cm->sexo == 'F') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio1" value="M" @if ($director_cm->sexo == 'M') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control" id="perfil_nac_medico" name="perfil_nac_medico" value="{{$director_cm->fecha_nac }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_medico_datos_personales();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Datos Personales-->
                                        </div>
                                        <!--Cierre: Card Datos Personales-->

                                        <!--Contraseña-->
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Cambiar contraseña</h5>
                                                <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".pass_personal_director_cm" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contraseña-->
                                            <div class="card-body pass_personal_director_cm collapse show" id="pass_personal_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Contraseña actual</label>
                                                        <div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> •••••••• </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contraseña-->
                                            <!--(Editar)Contraseña-->
                                            <div class="card-body pass_personal_director_cm collapse" id="pass_personal_2">
                                                <form method="get" action="{{ route('adm_cm.cambio_contrasena_responsable')}}" id="form_cambio_contrasena_perfil_responsable" name="form_cambio_contrasena_perfil_responsable">
                                                    <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $responsable->Usuario()->first()->id }}">
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
                                        <!--Card Contacto-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Contacto</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_contacto_" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contacto-->
                                            <div class="card-body border-top info_contacto_ collapse show" id="info_contacto_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo
                                                            Electrónico</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_cm->email }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_cm->telefono_uno }}</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_cm->telefono_dos }}</div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contacto-->
                                            <!--(Editar) Contacto-->
                                            <div class="card-body border-top info_contacto_ collapse " id="info_contacto_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{$director_cm->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{$director_cm->telefono_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono_dos" name="Perfil_fono_dos" value="{{$director_cm->telefono_dos }}">
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
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Residencia</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial_director_cm" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Residencia-->
                                            <div class="card-body border-top info_residencial_director_cm collapse show" id="info_residencial_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_cm->Direccion()->first()->Ciudad()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_cm->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Residencia-->
                                            <!--(Editar) Residencia-->
                                            <div class="card-body border-top info_residencial_director_cm collapse " id="info_residencial_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" onchange="buscar_ciudad_responsable();" id="perfil_region" name="perfil_region">
                                                                <option value="">Seleccione una Región</option>
                                                                @if (isset($regiones))
                                                                    @foreach ($regiones as $region)
                                                                    <option value="{{ $region->id }}" @if ($region->id ==
                                                                    $director_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
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
                                                                    <option value="{{ $ciudad->id }}" @if ($director_cm->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
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
                                                            <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{$director_cm->Direccion()->first()->direccion }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Depto</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{$director_cm->Direccion()->first()->numero_dir }}">
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
                                    @endif
                                    @if(isset($subdirector_cm) && $subdirector_cm != null)
                                    <div class="col-md-4">
                                        <!--Card Información Básica-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Datos Personales SubDirector Medico</h5>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_admin_cm(2,{{ $institucion->id }})"><i class="fas fa-trash"></i></button>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica_subdirector_cm" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Datos Personales-->
                                            <div class="card-body border-top info_basica_subdirector_cm collapse show" id="info_basica-1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$subdirector_cm->rut }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$subdirector_cm->nombre }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Primer
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$subdirector_cm->apellido_uno }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Segundo
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$subdirector_cm->apellido_dos }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            @if ($subdirector_cm->sexo == 'F')
                                                                Mujer
                                                            @elseif ($subdirector_cm->sexo == 'M')
                                                                Hombre
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{ \Carbon\Carbon::parse($subdirector_cm->fecha_nac)->format('d-m-Y') }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Datos Personales-->
                                            <!--(Editar)Datos Personales-->
                                            <div class="card-body border-top info_basica_subdirector_cm collapse" id="pinfo_basica_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Rut" id="perfil_rut_medico" name="perfil_rut_medico" value="{{$subdirector_cm->rut }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Nombre" id="perfil_nombre_medico" name="perfil_nombre_medico" value="{{$subdirector_cm->nombre }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_uno_medico" name="perfil_apellido_uno_medico" placeholder="Primer Apellido" value="{{$subdirector_cm->apellido_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_dos_medico" name="perfil_apellido_dos_medico" placeholder="Segundo Apellido" value="{{$subdirector_cm->apellido_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-7 my-auto">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio2" value="F" @if ($subdirector_cm->sexo == 'F') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio1" value="M" @if ($subdirector_cm->sexo == 'M') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control" id="perfil_nac_medico" name="perfil_nac_medico" value="{{$subdirector_cm->fecha_nac }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_medico_datos_personales();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Datos Personales-->
                                        </div>
                                        <!--Cierre: Card Datos Personales-->

                                        <!--Contraseña-->
                                        <div class="card">
                                            <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Cambiar contraseña</h5>
                                                <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right" data-toggle="collapse" data-target=".pass_personal_subdirector_cm" aria-expanded="false" aria-controls="pass_personal_1 pass_personal_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contraseña-->
                                            <div class="card-body pass_personal_subdirector_cm collapse show" id="pass_personal_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Contraseña actual</label>
                                                        <div class="col-sm-7 pt-2 ml-2 font-weight-bolder"> •••••••• </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contraseña-->
                                            <!--(Editar)Contraseña-->
                                            <div class="card-body pass_personal_subdirector_cm collapse" id="pass_personal_2">
                                                <form method="get" action="{{ route('adm_cm.cambio_contrasena_responsable')}}" id="form_cambio_contrasena_perfil_responsable" name="form_cambio_contrasena_perfil_responsable">
                                                    <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $responsable->Usuario()->first()->id }}">
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
                                        <!--Card Contacto-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Contacto</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_contacto_subdirector_cm" aria-expanded="false" aria-controls="info_contacto_1 info_contacto_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Contacto-->
                                            <div class="card-body border-top info_contacto_subdirector_cm collapse show" id="info_contacto_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo
                                                            Electrónico</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$subdirector_cm->email }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$subdirector_cm->telefono_uno }}</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$subdirector_cm->telefono_dos }}</div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Contacto-->
                                            <!--(Editar) Contacto-->
                                            <div class="card-body border-top info_contacto_subdirector_cm collapse " id="info_contacto_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Correo Electrónico</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{$subdirector_cm->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{$subdirector_cm->telefono_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono_dos" name="Perfil_fono_dos" value="{{$subdirector_cm->telefono_dos }}">
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
                                        @if(isset($subdirector_cm))
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Residencia</h5>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_residencial_subdirector_cm" aria-expanded="false" aria-controls="info_residencial_1 info_residencial_2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Residencia-->
                                            <div class="card-body border-top info_residencial_subdirector_cm collapse show" id="info_residencial_1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$subdirector_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$subdirector_cm->Direccion()->first()->Ciudad()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$subdirector_cm->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: Residencia-->
                                            <!--(Editar) Residencia-->
                                            <div class="card-body border-top info_residencial_subdirector_cm collapse " id="info_residencial_2">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Región</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" onchange="buscar_ciudad_responsable();" id="perfil_region" name="perfil_region">
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
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Ciudad</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" id="perfil_ciudad" name="perfil_ciudad">
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
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{$subdirector_cm->Direccion()->first()->direccion }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Depto</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{$subdirector_cm->Direccion()->first()->numero_dir }}">
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
                                        @endif
                                        <!--Cierre: Card Residencia-->
                                    </div>
                                    @endif
                                    @if(isset($director_gestion_cuidado) && $director_gestion_cuidado != null)
                                    <div class="col-md-4">
                                        <!--Card Información Básica-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Datos Personales SubDirector Gestion Cuidado</h5>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_admin_cm(3,{{ $institucion->id }})"><i class="fas fa-trash"></i></button>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Datos Personales-->
                                            <div class="card-body border-top info_basica collapse show" id="info_basica-1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_gestion_cuidado->rut }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_gestion_cuidado->nombre }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Primer
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_gestion_cuidado->apellido_uno }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Segundo
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_gestion_cuidado->apellido_dos }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            @if ($director_gestion_cuidado->sexo == 'F')
                                                                Mujer
                                                            @elseif ($director_gestion_cuidado->sexo == 'M')
                                                                Hombre
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{ \Carbon\Carbon::parse($director_gestion_cuidado->fecha_nac)->format('d-m-Y') }}
                                                        </div>
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
                                                            <input type="text" class="form-control" placeholder="Rut" id="perfil_rut_medico" name="perfil_rut_medico" value="{{$director_gestion_cuidado->rut }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Nombre" id="perfil_nombre_medico" name="perfil_nombre_medico" value="{{$director_gestion_cuidado->nombre }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_uno_medico" name="perfil_apellido_uno_medico" placeholder="Primer Apellido" value="{{$director_gestion_cuidado->apellido_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_dos_medico" name="perfil_apellido_dos_medico" placeholder="Segundo Apellido" value="{{$director_gestion_cuidado->apellido_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-7 my-auto">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio2" value="F" @if ($director_gestion_cuidado->sexo == 'F') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio1" value="M" @if ($director_gestion_cuidado->sexo == 'M') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control" id="perfil_nac_medico" name="perfil_nac_medico" value="{{$director_gestion_cuidado->fecha_nac }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_medico_datos_personales();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Datos Personales-->
                                        </div>
                                        <!--Cierre: Card Datos Personales-->

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
                                                    <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $responsable->Usuario()->first()->id }}">
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
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_gestion_cuidado->email }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_gestion_cuidado->telefono_uno }}</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_gestion_cuidado->telefono_dos }}</div>
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
                                                            <input type="text" class="form-control" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{$director_gestion_cuidado->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{$director_gestion_cuidado->telefono_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono_dos" name="Perfil_fono_dos" value="{{$director_gestion_cuidado->telefono_dos }}">
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
                                                            {{$director_gestion_cuidado->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_gestion_cuidado->Direccion()->first()->Ciudad()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_gestion_cuidado->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
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
                                                                @if (isset($regiones))
                                                                    @foreach ($regiones as $region)
                                                                    <option value="{{ $region->id }}" @if ($region->id ==
                                                                    $director_gestion_cuidado->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
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
                                                                    <option value="{{ $ciudad->id }}" @if ($director_gestion_cuidado->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
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
                                                            <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{$director_gestion_cuidado->Direccion()->first()->direccion }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Depto</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{$director_gestion_cuidado->Direccion()->first()->numero_dir }}">
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
                                    @endif
                                    @if(isset($director_tecnico) && $director_tecnico != null)
                                    <div class="col-md-4">
                                        <!--Card Información Básica-->
                                        <div class="card">
                                            <div class="card-body d-flex align-items-center justify-content-between bg-info">
                                                <h5 class="mb-0 text-white">Datos Personales Director Técnico</h5>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_admin_cm(8,{{ $institucion->id }})"><i class="fas fa-trash"></i></button>
                                                <button type="button" class="btn btn-light btn-sm rounded m-0 float-right" data-toggle="collapse" data-target=".info_basica" aria-expanded="false" aria-controls="info_basica-1 info_basica-2">
                                                    <i class="feather icon-edit"></i>
                                                </button>
                                            </div>
                                            <!--Datos Personales-->
                                            <div class="card-body border-top info_basica collapse show" id="info_basica-1">
                                                <form>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Rut</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_tecnico->rut }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_tecnico->nombre }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Primer
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_tecnico->apellido_uno }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Segundo
                                                            Apellido</label>
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_tecnico->apellido_dos }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            @if ($director_tecnico->sexo == 'F')
                                                                Mujer
                                                            @elseif ($director_tecnico->sexo == 'M')
                                                                Hombre
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{ \Carbon\Carbon::parse($director_tecnico->fecha_nac)->format('d-m-Y') }}
                                                        </div>
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
                                                            <input type="text" class="form-control" placeholder="Rut" id="perfil_rut_medico" name="perfil_rut_medico" value="{{$director_tecnico->rut }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nombre</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" placeholder="Nombre" id="perfil_nombre_medico" name="perfil_nombre_medico" value="{{$director_tecnico->nombre }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Primer Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_uno_medico" name="perfil_apellido_uno_medico" placeholder="Primer Apellido" value="{{$director_tecnico->apellido_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Segundo Apellido</label>
                                                        <div class="col-sm-7">
                                                            <input type="text" class="form-control" id="perfil_apellido_dos_medico" name="perfil_apellido_dos_medico" placeholder="Segundo Apellido" value="{{$director_tecnico->apellido_dos }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Sexo</label>
                                                        <div class="col-sm-7 my-auto">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio2" value="F" @if ($director_tecnico->sexo == 'F') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio2">Mujer</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="perfil_sexo_medico" name="perfil_sexo_medico" id="inlineRadio1" value="M" @if ($director_tecnico->sexo == 'M') checked @endif>
                                                                <label class="form-check-label" for="inlineRadio1">Hombre</label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label font-weight-bolder">Nacimiento</label>
                                                        <div class="col-sm-7">
                                                            <input type="date" class="form-control" id="perfil_nac_medico" name="perfil_nac_medico" value="{{$director_tecnico->fecha_nac }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-form-label"></label>
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger mr-2">Cancelar</button>
                                                            <button type="button" onclick="editar_responsable_medico_datos_personales();" class="btn btn-info">Guardar Cambios</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--Cierre: (Editar)Datos Personales-->
                                        </div>
                                        <!--Cierre: Card Datos Personales-->

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
                                                    <input type="hidden" name="responsable_id" id="responsable_id" value="{{ $responsable->Usuario()->first()->id }}">
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
                                                        <div class="col-sm-6 my-auto ml-2"> {{$director_tecnico->email }} </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_tecnico->telefono_uno }}</div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6 my-auto ml-2">{{$director_tecnico->telefono_dos }}</div>
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
                                                            <input type="text" class="form-control" id="Perfil_email" name="Perfil_email" placeholder="Correo Electrónico" value="{{$director_tecnico->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono" name="Perfil_fono" value="{{$director_tecnico->telefono_uno }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Teléfono</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="Teléfono" id="Perfil_fono_dos" name="Perfil_fono_dos" value="{{$director_tecnico->telefono_dos }}">
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
                                                            {{$director_tecnico->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Comuna</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_tecnico->Direccion()->first()->Ciudad()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Dirección</label>
                                                        <div class="col-sm-6 my-auto ml-2">
                                                            {{$director_tecnico->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
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
                                                                @if (isset($regiones))
                                                                    @foreach ($regiones as $region)
                                                                    <option value="{{ $region->id }}" @if ($region->id ==
                                                                    $director_tecnico->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
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
                                                                    <option value="{{ $ciudad->id }}" @if ($director_tecnico->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
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
                                                            <input type="text" class="form-control" placeholder="Dirección" name="perfil_dire" id="perfil_dire" value="{{$director_tecnico->Direccion()->first()->direccion }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-5 col-form-label font-weight-bolder">Piso/Depto</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" placeholder="n&uacute;mero #" name="perfil_numero_dir" id="perfil_numero_dir" value="{{$director_tecnico->Direccion()->first()->numero_dir }}">
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
                                    @endif
                                </div>
                            </div>

                        </div>
                        <!--CIERRE: PERFIL ADMINISTRADOR-->

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
                                                            @if($personal)
                                                                @foreach($personal as $per)
                                                                    <tr>
                                                                        <td class="text-wrap text-left align-middle">{{ $per->nombres . ' ' . $per->apellido_uno . ' ' . $per->apellido_dos }}</td>
                                                                        <td class="text-wrap text-left align-middle">{{ $per->rut }}</td>
                                                                        @if($per->AsistenteTipo)
                                                                            <td class="align-middle text-left"><strong>{{ $per->AsistenteTipo->nombre }}</strong></td>
                                                                            <td class="text-wrap text-center align-middle">
                                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="anadir_permisos('{{ $per->AsistenteTipo->nombre }}', {{ $per->AsistenteTipo->id }},{{ $per->id }});" data-toggle="tooltip" data-placement="top" title="Permisos"><i class="feather icon-settings"></i></button>
                                                                            </td>
                                                                        @else
                                                                            <td class="align-middle text-left"><strong>{{ $per->TipoAdministrador->nombre }}</strong></td>
                                                                            <td class="text-wrap text-center align-middle">
                                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="anadir_permisos('{{ $per->TipoAdministrador->nombre }}', {{ $per->TipoAdministrador->id }},{{ $per->id }});" data-toggle="tooltip" data-placement="top" title="Permisos"><i class="feather icon-settings"></i></button>
                                                                            </td>
                                                                        @endif
                                                                    </tr>
                                                                @endforeach
                                                            @endif
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

                        <!--ESPECIALIDADES Y ÁREAS-->
                        <div class="tab-pane fade" id="ar-dep" role="tabpanel" aria-labelledby="ar-dep-tab">
                            <div class="row">
                                <!--Especialidades-->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header pt-3 pb-2 bg-light">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="f-18 d-inline mt-3 text-info">Especialidades Médicas</h6>
                                                    <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                        <button type="button" class="btn btn-sm btn-info" onclick="ag_especialidad();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12">
                                                    <table id="especialidades_cm" class="display table table-striped table-xs dt-responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-wrap text-center align-middle">Tipo Especialidad</th>
                                                                <th class="text-wrap text-center align-middle">SubTipo Especialidad</th>
                                                                <th class="text-wrap text-center align-middle">N° Profesionales</th>
                                                                <th class="text-wrap text-center align-middle">Acción</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if(isset($especialidades_cm))
                                                            @foreach($especialidades_cm as $especialidad)
                                                            <tr>
                                                                <td class="align-middle text-center">{{ $especialidad->nombre }}</td>
                                                                <td class="align-middle text-center">{{ $especialidad->sub_tipo }}</td>
                                                                <td class="align-middle text-center">{{ $especialidad->num_profesionales }}</td>
                                                                <td class="align-middle text-center">
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox" class="custom-control-input" id="esp-{{ $especialidad->id }}" onchange="cambiarEstadoEspecialidad({{ $especialidad->id }})" @if($especialidad->estado == 1) checked @endif>
                                                                        <label class="custom-control-label" for="esp-{{ $especialidad->id }}"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <button type="button" class="btn btn-outline-warning btn-sn btn-icon" onclick="dame_especialidad_cm({{ $especialidad->id }})"><i class="fas fa-edit"></i></button>
                                                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm({{ $especialidad->id }});"><i class="feather icon-trash"></i></button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Área-->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header pt-3 pb-2 bg-light">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="f-18 d-inline mt-3 text-info">Áreas</h6>
                                                    <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                        <button type="button" class="btn btn-sm btn-info" onclick="ag_area();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12">
                                                    <table id="area_cm" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-wrap text-left align-middle">Área</th>
                                                                <th class="text-wrap text-left align-middle">Responsable</th>
                                                                <th class="text-wrap text-left align-middle">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($areas_cm as $area)
                                                            <tr>
                                                                <td class="align-middle text-left">{{ $area->tipo_area }}</td>
                                                                <td class="align-middle text-left">{{ $area->nombre . ' ' . $area->apellido_uno . ' ' . $area->apellido_dos }}</td>
                                                                <td class="align-middle text-left">
                                                                    <button type="button" class="btn btn-outline-warning btn-sn btn-icon" data-toggle="tooltip" data-placement="top" title="Editar responsable {{ $area->tipo_area }}" onclick="dame_area_cm({{ $area->id_responsable }},{{ $institucion->id_lugar_atencion }})"><i class="fas fa-edit"></i></button>
                                                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" data-toggle="tooltip" data-placement="top" title="Eliminar area {{ $area->tipo_area }}" onclick="eliminar_area_cm({{ $area->id }});"><i class="feather icon-trash"></i></button>
                                                                </td>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              

                                <!-- Procedimientos -->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header pt-3 pb-2 bg-light">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="f-18 d-inline mt-3 text-info">Examenes</h6>
                                                    <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                        <button type="button" class="btn btn-sm btn-info" onclick="ag_procedimiento();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <table id="procedimiento_cm" class="table table-striped" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-wrap text-left align-middle">Nombre</th>
                                                                <th class="text-wrap text-left align-middle">Descripcion</th>
                                                                {{-- <th class="text-wrap text-left align-middle">minutos_bloque</th> --}}
                                                                <th class="text-wrap text-left align-middle">Cantidad Bloques</th>
                                                                <th class="text-wrap text-left align-middle">Valor</th>
                                                                <th class="text-wrap text-left align-middle">Eliminar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (!empty($procedimientos))
                                                                @foreach($procedimientos as $proced)
                                                                    <tr>
                                                                        <td class="align-middle text-left">{{ $proced->nombre }}</td>
                                                                        <td class="align-middle text-left">{{ $proced->descripcion }}</td>
                                                                        {{-- <td class="align-middle text-left">{{ $proced->minutos_bloque }}</td> --}}
                                                                        <td class="align-middle text-left">{{ $proced->cantidad_bloques }}</td>
                                                                        <td class="align-middle text-left">$ {{ empty($proced->valor)?0:number_format($proced->valor, 0, ",", ".") }}</td>
                                                                        <td class="align-middle text-left">
                                                                            <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_procedimiento_cm({{ $proced->id }});"><i class="feather icon-trash"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  <!--Servicios-->
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header pt-3 pb-2 bg-light">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="f-18 d-inline mt-3 text-info">Servicios</h6>
                                                    <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                        <button type="button" class="btn btn-sm btn-info" onclick="ag_servicio();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12">
                                                    <table id="servicios_cm" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-wrap text-left align-middle">Servicio</th>
                                                                <th class="text-wrap text-left align-middle">Responsable</th>
                                                                <th class="text-wrap text-left align-middle">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($servicios_internos as $servicio)
                                                            <tr>
                                                                <td class="align-middle text-left">{{ $servicio->nombre }}</td>
                                                                <td class="align-middle text-left">{{ $servicio->nombre_responsable . ' ' . $servicio->apellido_uno_responsable . ' ' . $servicio->apellido_dos_responsable }}</td>
                                                                <td class="align-middle text-left">
                                                                    <button type="button" class="btn btn-outline-warning btn-sn btn-icon" onclick="dame_servicio_cm({{ $servicio->id }})"><i class="fas fa-edit"></i></button>
                                                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_servicio_cm({{ $servicio->id }});"><i class="feather icon-trash"></i></button>
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
<!--BODEGAS-->
                        <div class="tab-pane fade" id="bodegas_serv" role="tabpanel"
                            aria-labelledby="bodegas_serv-tab">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header bg-info">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="f-18 d-inline mt-3 text-white pt-2">Bodegas</h6>
                                                    <div class="btn-group mb-2 mr-2 float-right">
                                                        <button type="button" class="btn btn-light btn-sm mx-2"
                                                            onclick="añadir_bodega_nueva();"><i class="fa fa-plus"
                                                                aria-hidden="true"></i>&nbsp;Añadir bodega</button>
                                                        <button type="button" class="btn btn-light btn-sm"
                                                            onclick="añadir_bodega();"><i class="fa fa-plus"
                                                                aria-hidden="true"></i>&nbsp;Añadir nuevo
                                                            responsable</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" id="contenedor_bodegas">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                </div>
                                            </div>
                                            <table id="bodegas_tabla"
                                                class="display table table-striped dt-responsive nowrap table-xs"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Nombre</th>
                                                        <th class="align-middle">Ubicacion</th>
                                                        <th class="align-middle">Productos</th>
                                                        <th class="align-middle">Productos C/Autorizacion</th>
                                                        <th class="align-middle">Responsable</th>
                                                        <th class="align-middle">acción</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($bodegas))
                                                        @foreach ($bodegas as $bodega)
                                                            <tr>
                                                                <td>{{ $bodega->nombre }}
                                                                    {{ $bodega->apellido_uno_responsable }}</td>
                                                                <td>{{ $bodega->direccion }}</td>
                                                                <td>
                                                                    <ul>
                                                                        @foreach ($bodega->tipos_productos as $tp)
                                                                            <li>{{ $tp }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul>
                                                                        @foreach ($bodega->tipo_productos_autorizacion as $tp)
                                                                            <li>{{ $tp }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <ul>
                                                                        @foreach ($bodega->responsables as $res)
                                                                            <li>{{ $res->nombre }}
                                                                                {{ $res->apellido_uno }}
                                                                                {{ $res->apellido_dos }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-warning btn-icon"
                                                                        onclick="editar_bodega({{ $bodega->id }});"><i
                                                                            class="feather icon-edit"></i></button>
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-icon"
                                                                        onclick="eliminar_bodega({{ $bodega->id }})"><i
                                                                            class="feather icon-x"></i></button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--SUCURSALES-->
                        <div class="tab-pane fade" id="sucursales" role="tabpanel" aria-labelledby="sucursales-tab">

                            @include('general.seccion_adm_institucion.sucursales')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <div id="a_rol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_rol" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Agregar Empleado Nuevo</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="add_empleado_id_institucion" id="add_empleado_id_institucion" value="{{ $institucion->id }}">
                    <input type="hidden" name="add_empleado_id_lugar_atencion" id="add_empleado_id_lugar_atencion" value="{{ $institucion->id_lugar_atencion }}">
                    <input type="hidden" name="add_empleado_id_admin_creador" id="add_empleado_id_admin_creador" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="add_empleado_id_tipo_admin_creador" id="add_empleado_id_tipo_admin_creador" value="{{ Auth::user()->Roles()->first()->id }}">
                    <input type="hidden" name="" id="">
                    <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
                        <tbody>
                            <tr>
                                <th class="align-middle" colspan="2">Tipo Contrato</th>
                                <th class="align-middle" colspan="2">
                                    <select class="form-control form-control-sm" name="add_empleado_tipo_contrato" id="add_empleado_tipo_contrato">
                                        <option value="">Seleccione</option>
                                        @if ($lista_tipo_contrato)

                                            @foreach ($lista_tipo_contrato as $item)
                                                <option value="{{ $item['nombre'] }}" data-id="{{ $item['id'] }}">{{ $item['nombre'] }}</option>
                                            @endforeach
                                        @endif
                                        {{--  asistente tipo  --}}
                                        {{--  tipo institucion  --}}
                                        {{--  tipo administrador  --}}
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4"><h5>Información Personal</h5></th>
                            </tr>
                            <tr>
                                <th class="align-middle">Rut</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm" name="add_empleado_rut" id="add_empleado_rut">
                                </th>
                                <th class="align-middle">Nombres</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm" name="add_empleado_nombre" id="add_empleado_nombre">
                                </th>
                            </tr>

                            <tr>
                                <th class="align-middle">Apellido Paterno</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm" name="add_empleado_apellido_uno" id="add_empleado_apellido_uno">
                                </th>
                                <th class="align-middle">Apellido Materno</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm" name="add_empleado_apellido_dos" id="add_empleado_apellido_dos">
                                </th>
                            </tr>
                            <tr>
                                <th class="align-middle">Email</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm" name="add_empleado_email" id="add_empleado_email">
                                </th>
                                <th class="align-middle">Telefono</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm" name="add_empleado_telefono" id="add_empleado_telefono">
                                </th>
                            </tr>

                            <tr>
                                <th colspan="4"><h5>Dirección</h5></th>
                            </tr>
                            <tr>
                                <th class="align-middle">Región</th>
                                <th class="align-middle">
                                    <select class="form-control form-control-sm" name="add_empleado_region" id="add_empleado_region" onchange="buscar_ciudad_nuevo_empleado();">
                                        <option value="">Seleccione</option>
                                        @if($regiones)
                                            @foreach ($regiones as $reg )
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                            @endforeach

                                        @endif
                                    </select>
                                </th>
                                <th class="align-middle">Ciudad</th>
                                <th class="align-middle">
                                    <select class="form-control form-control-sm" name="add_empleado_ciudad" id="add_empleado_ciudad">
                                        <option value="">Seleccione</option>
                                    </select>
                                </th>
                            </tr>

                            <tr>
                                <th class="align-middle">Dirección</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm" name="add_empleado_direccion" id="add_empleado_direccion">
                                </th>
                                <th class="align-middle">Número</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm" name="add_empleado_numero" id="add_empleado_numero">
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4"><h5>Horario</h5></th>
                            </tr>
                            <tr>
                                <th class="align-middle">Dias Laborales</th>
                                <th class="align-middle" colspan="3">
                                    <select class="js-example-basic-multiple" name="add_empleado_dias_laborales" id="add_empleado_dias_laborales" multiple="multiple">
                                        <option value="">Seleccione</option>
                                        <option value="1">Lunes</option>
                                        <option value="2">Martes</option>
                                        <option value="3">Miercoles</option>
                                        <option value="4">Jueves</option>
                                        <option value="5">Viernes</option>
                                        <option value="6">Sabado</option>
                                        <option value="7">Domingo</option>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th class="align-middle">Hora entrada</th>
                                <th class="align-middle">
                                    <input type="time" class="form-control form-control-sm" id="add_empleado_hora_entrada" name="add_empleado_hora_entrada" value="08:00">
                                </th>
                                <th class="align-middle">Hora salida</th>
                                <th class="align-middle">
                                    <input type="time" class="form-control form-control-sm" id="add_empleado_hora_salida" name="add_empleado_hora_salida" value="19:00">
                                </th>

                            </tr>
                            <tr>
                                <th class="align-middle">Hora inicio colación</th>
                                <th class="align-middle">
                                    <input type="time" class="form-control form-control-sm" id="add_empleado_hora_entrada_colacion" name="add_empleado_hora_entrada_colacion" value="12:00">
                                </th>
                                <th class="align-middle">Hora término colación</th>
                                <th class="align-middle">
                                    <input type="time" class="form-control form-control-sm" id="add_empleado_hora_salida_colacion" name="add_empleado_hora_salida_colacion" value="13:00">
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4"><h5>Identificador a Institución</h5></th>
                            </tr>
                            <tr>
                                <th class="align-middle">Clave de Ingreso</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm" id="add_empleado_clave_ingreso" name="add_empleado_clave_ingreso" placeholder="Clave ingreso Institución" value="">
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="registrar_nuevo_empleado();">Añadir al Equipo</button>
                </div>
            </div>
        </div>
    </div>

    {{--  MODAL AREA  --}}
    <div id="a_area" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_area" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir o editar direccion medica</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar áreas-->
                                    <label class="floating-label">Cargo</label>
                                    <select class="form-control form-control-sm" id="cargo">
                                        <option value="0">Seleccione</option>
                                        @foreach($cargos as $cargo)
                                            <option value="{{ $cargo->id }}">{{ $cargo->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar áreas-->
                                    <label class="floating-label">Responsable</label>
                                    <select class="form-control form-control-sm" id="responsable_cargo">
                                        <option value="0">Seleccione</option>
                                        @if(isset($profesionales))
                                        @foreach($profesionales as $profesional)
                                            <option value="{{ $profesional->id_profesional }}">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="editar_direccion_medica({{ $institucion->id }})">Editar direccion medica</button>
                </div>
            </div>
        </div>
    </div>

    {{--  MODAL AREA  --}}
    <div id="a_servicio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_servicio" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir servicio</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar áreas-->
                                    <label class="floating-label">Servicio</label>
                                    <div class="d-flex justify-content-between">
                                        <select class="form-control form-control-sm" id="servicio" >
                                            <option value="0">Seleccione</option>
                                            @if(isset($servicios))
                                            @foreach($servicios as $servicio)
                                                <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <button type="button" class="btn btn-outline-success btn-sm" onclick="mostrar_div_servicio()"><i class="fas fa-plus"></i> </button>
                                    </div>

                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar áreas-->
                                    <label class="floating-label">Responsable</label>
                                    <select class="form-control form-control-sm" id="responsable_servicio">
                                        <option value="0">Seleccione</option>
                                        @if(isset($profesionales))
                                        @foreach($profesionales as $profesional)
                                            <option value="{{ $profesional->id }}">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div id="div_form_servicio" class="d-none w-100">
                                <div class="col-sm-12">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm" for="nombre_servicio_">Nombre</label>
                                        <input type="text" class="form-control form-control-sm" name="nombre_servicio_" id="nombre_servicio_">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm" for="rut_servicio">RUT</label>
                                        <input type="text" class="form-control form-control-sm" name="rut_servicio" id="rut_servicio">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Dirección</label>
                                        <input type="address" class="form-control form-control-sm" name="direccion_servicio" id="direccion_servicio">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm" for="telefono_servicio">Telefono</label>
                                        <input type="text" class="form-control form-control-sm" name="telefono_servicio" id="telefono_servicio">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm" for="email_servicio">Email</label>
                                        <input type="text" class="form-control form-control-sm" name="email_servicio" id="email_servicio">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-outline-success btn-sm my-3 float-right" onclick="guardar_nuevo_servicio()"><i class="fas fa-save"></i> Guardar</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_servicio()">Añadir</button>
                </div>
            </div>
        </div>
    </div>

    {{--  MODAL PROCEDIMIENTO  --}}
    <div id="a_procedimiento" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_procedimiento" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir Procedimiento</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label">Nombre</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="text" name="a_procedimeinto_nombre" id="a_procedimeinto_nombre" value="">
                                    </div>
                                </div>

                                <div class="form-group fill">
                                    <label class="floating-label">Descripción</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="text" name="a_procedimeinto_descripcion" id="a_procedimeinto_descripcion" value="">
                                    </div>
                                </div>

                                <div class="form-group fill">
                                    <label class="floating-label">Cantidad Bloques</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="number" name="a_procedimeinto_cantidad_bloques" id="a_procedimeinto_cantidad_bloques" step="1" max="24" value="">
                                    </div>
                                </div>

                                <div class="form-group fill">
                                    <label class="floating-label">Valor $</label>
                                    <div class="d-flex justify-content-between">
                                        <input class="form-control form-control-sm" type="number" name="a_procedimeinto_valor" id="a_procedimeinto_valor" step="1"  value="0">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_procedimiento()">Añadir</button>
                </div>
            </div>
        </div>
    </div>

    {{--  MODAL ESPECIALIDADES  --}}
    <div id="a_especialidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_especialidad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir especialidad</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar especialidades-->
                                    <label class="floating-label-activo-sm">Tipo Especialidad</label>
                                    <select class="form-control form-control-sm" id="especialidad_cm" name="especialidad_cm" onchange="buscar_sub_tipo_especialidad(this);">
                                        <option>Seleccione</option>
                                        @if(isset($especialidades))
                                            @foreach ($especialidades as $especialidad)
                                                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Sub Tipo Especialidad</label>
                                    <select class="form-control form-control-sm" name="sub_tipo_especialidad_cm" id="sub_tipo_especialidad_cm">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">N° Profesionales</label>
                                    <input type="number" name="num_profesionales" id="num_profesionales" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_especialidad_cm()">Añadir</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL EDITAR ESPECIALIDAD --}}
    <div id="editar_especialidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_especialidad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Editar especialidad</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar especialidades-->
                                    <label class="floating-label-activo-sm">Tipo Especialidad</label>
                                    <select class="form-control form-control-sm" id="editar_especialidad_nombre" name="editar_especialidad_nombre" onchange="buscar_sub_tipo_especialidad(this);">
                                        <option>Seleccione</option>
                                        @if(isset($especialidades))
                                            @foreach ($especialidades as $especialidad)
                                                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Sub Tipo Especialidad</label>
                                    <select class="form-control form-control-sm" name="editar_especialidad_sub_tipo" id="editar_especialidad_sub_tipo">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">N° Profesionales</label>
                                    <input type="number" name="editar_especialidad_num_profesionales" id="editar_especialidad_num_profesionales" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="editar_especialidad_cm()">Editar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editar_area" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_area" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Editar area</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar áreas-->
                                    <label class="floating-label-activo-sm">Responsable</label>
                                    <select class="form-control form-control-sm" id="editar_responsable" name="editar_responsable">
                                        <option>Seleccione</option>
                                        @foreach($profesionales as $p)
                                            <option value="{{ $p->id }}">{{ $p->nombre }} {{ $p->apellido_uno }} {{ $p->apellido_dos }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="editar_area_cm({{ $institucion->id_lugar_atencion }})">Editar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{--  MODAL ESPECIALIDADES  --}}
    <div id="a_otra_especialidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_otra_especialidad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir otra especialidad</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar especialidades-->
                                    <label class="floating-label">Especialidad</label>
                                    <select class="form-control form-control-sm" id="especialidad_cm_otra" name="especialidad_cm_otra">
                                        <option>Seleccione</option>
                                        @if(isset($especialidades))
                                            @foreach ($especialidades as $especialidad)
                                                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_otra_especialidad_cm()">Añadir</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <input type="hidden" id="id_especialidad_cm" name="id_especialidad_cm" value="">
    <input type="hidden" id="id_institucion" name="id_institucion" value="">
    <input type="hidden" id="id_lugar_atencion" name="id_lugar_atencion" value="">
<!--Cierre: Container Completo-->
@endsection
@section('modales')
    @include('app.laboratorio.modales.agregar_bodega')
    @include('app.laboratorio.modales.agregar_bodega_editar')
        @include('app.adm_cm.modales.agregar_box')
@endsection

@section('page-script')
    <!--SCRIPT MODALS-->
    <script>
        {{--  /*-TABLAS CM-*/  --}}
        {{--  /*-adm_roles-*/  --}}
        {{--  $(document).ready(function() {
            $('#adm_roles').DataTable({
                responsive: true
            });
        });  --}}
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

        $(document).ready(function() {
            $('#procedimiento_cm').DataTable({
                responsive: true
            });
        });

        /*-CENTRO MÉDICO-*/
        /*-Añadir especialidad-*/
        function ag_especialidad() {
            $('#a_especialidad').modal('show');
        }

        function ag_otra_especialidad(){
            $('#a_otra_especialidad').modal('show');
        }

        /*-Añadir área-*/
        function ag_area() {
            $('#a_area').modal('show');
        }

        function ag_servicio(){
            $('#a_servicio').modal('show');
        }

        function ag_procedimiento(){
            $('#a_procedimiento').modal('show');
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
                    id_lugar_atencion : '{{ $institucion->id_lugar_atencion }}',
                },
            })
            .done(function(response) {

                if (response.estado == 1)
                {
                    $('#personal_id_persona').val(id);
                    $('#personal_id_personal').val(response.registro.rut);
                    $('#personal_id_lugar_atencion').val('{{ $institucion->id_lugar_atencion }}');
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
                    });
        }

        function editar_responsable_medico_datos_personales(){
            let id_responsable = $('#id_responsable_medico').val();
            let rut = $('#perfil_rut_medico').val();
            let nombre = $('#perfil_nombre_medico').val();
            let apellido_uno = $('#perfil_apellido_uno_medico').val();
            let apellido_dos = $('#perfil_apellido_dos_medico').val();
            let sexo = $('input:radio[name=perfil_sexo_medico]:checked').val();
            let nac = $('#perfil_nac_medico').val();
            let url = "{{ route('adm_cm.editar_datos_perfil_responsable_medico') }}";

            let data = {
                _token: CSRF_TOKEN,
                id_responsable:id_responsable,
                rut:rut,
                nombres:nombre,
                apellido_uno:apellido_uno,
                apellido_dos:apellido_dos,
                sexo:sexo,
                fecha_nac:nac,
            }

            $.ajax({
                        url: url,
                        type: 'POST',
                        data: data,
                    })
                    .done(function(response) {
                        console.log(response);
                        if (response.estado == 1) {
                            swal({
                                title: "Datos de Datos del Representante editados correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        } else {
                            swal({
                                title: "Error al Editar los Datos del Representante",
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

        // function buscar_ciudad_nuevo_empleado(id_ciudad=0) {


        //     let region = $('#add_empleado_region').val();
        //     let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        //     $.ajax({

        //             url: url,
        //             type: "get",
        //             data: {
        //                 //_token: _token,
        //                 region: region,
        //             },
        //         })
        //         .done(function(data) {
        //             if (data != null) {
        //                 data = JSON.parse(data);

        //                 let ciudades = $('#add_empleado_ciudad');

        //                 ciudades.find('option').remove();
        //                 ciudades.append('<option value="0">seleccione</option>');
        //                 $(data).each(function(i, v) { // indice, valor
        //                     ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
        //                 })

        //                 if(id_ciudad != 0)
        //                     ciudades.val(id_ciudad);

        //             } else {

        //                 swal({
        //                     title: "Error",
        //                     text: "Error al cargar las ciudades",
        //                     icon: "error",
        //                     buttons: "Aceptar",
        //                     DangerMode: true,
        //                 })
        //                 // alert('No se pudo Cargar las ciudades');
        //             }

        //         })
        //         .fail(function(jqXHR, ajaxOptions, thrownError) {
        //             console.log(jqXHR, ajaxOptions, thrownError)
        //         });


        // };

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

        function guardar_especialidad_cm(){
            var valido = 1;
            var mensaje = '';
            let id_institucion = $('#id_institucion').val();
            let especialidad = $('#especialidad_cm').val();
            let sub_tipo_especialidad = $('#sub_tipo_especialidad_cm').val();
            let num_profesionales = $('#num_profesionales').val();

            if(id_institucion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Institución\n';
            }
            if(especialidad == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Especialidad\n';
            }
            if(sub_tipo_especialidad == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Sub Tipo Especialidad\n';
            }
            if(num_profesionales == '')
            {
                valido = 0;
                mensaje += 'Campo requerido N° Profesionales\n';
            }

            if(valido == 1)
            {

                var data = {
                    id_institucion : id_institucion,
                    especialidad : especialidad,
                    sub_tipo_especialidad: sub_tipo_especialidad,
                    _token: CSRF_TOKEN,
                    principal:1,
                    num_profesionales:num_profesionales,
                };
                let url = "{{ route('adm_cm.registrar_especialidad') }}";
                $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                     console.log(data);
                    if (data != null) {
                        if(data.estado == 1)
                        {
                            let especialidades = data.especialidades;
                            let otras_especialidades = data.otras_especialidades;
                            $('#especialidades_cm tbody').empty();
                            $('#otras_especialidades_cm tbody').empty();
                            $(especialidades).each(function(i, v) { // indice, valor
                                $('#especialidades_cm tbody').append(`
                                <tr>
                                    <td class="align-items-center text-center">${v.nombre}</td>
                                    <td class="align-items-center text-center">${v.sub_tipo}</td>
                                    <td class="align-items-center text-center">
                                        ${v.num_profesionales}
                                    </td>
                                    <td class="align-items-center text-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="esp-${v.id}" onchange="cambiarEstadoEspecialidad(${v.id})" ${v.estado == 1 ? 'checked' : ''}>
                                            <label class="custom-control-label" for="esp-${v.id}"></label>
                                        </div>
                                    </td>
                                    <td class="align-items-center text-center">
                                        <button type="button" class="btn btn-outline-warning btn-sm btn-icon" onclick="editar_especialidad_cm(${v.id})"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                    </td>
                                </tr>
                                `);
                            });
                            $(otras_especialidades).each(function(i, v) { // indice, valor
                                $('#otras_especialidades_cm tbody').append(`
                                <tr>
                                    <td class="align-items-center text-center">${v.nombre}</td>
                                    <td class="align-items-center text-center">5</td>
                                    <td class="align-items-center text-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                            <label class="custom-control-label" for="esp-${v.id}"></label>
                                        </div>
                                    </td>
                                    <td class="align-items-center text-center">
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_otra_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                    </td>
                                </tr>
                                `);
                            });
                        }
                        else
                        {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar especialidad",
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
                            text: "Error al cargar ingresar especialidad",
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

        function guardar_otra_especialidad_cm(){
            var valido = 1;
            var mensaje = '';
            let id_institucion = $('#id_institucion').val();
            let especialidad = $('#especialidad_cm_otra').val();

            if(id_institucion == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Institución\n';
            }
            if(especialidad == '')
            {
                valido = 0;
                mensaje += 'Campo requerido Especialidad\n';
            }

            if(valido == 1)
            {

                var data = {
                    id_institucion : id_institucion,
                    especialidad : especialidad,
                    _token: CSRF_TOKEN,
                    principal:0,
                };
                let url = "{{ route('adm_cm.registrar_especialidad') }}";
                $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                     console.log(data);
                    if (data != null) {
                        if(data.estado == 1)
                        {
                            let especialidades = data.especialidades;
                            let otras_especialidades = data.otras_especialidades;
                            $('#especialidades_cm tbody').empty();
                            $('#otros_profesionales_cm tbody').empty();
                            $(especialidades).each(function(i, v) { // indice, valor
                                $('#especialidades_cm tbody').append(`
                                <tr>
                                    <td class="align-items-center text-center">${v.nombre}</td>
                                    <td class="align-items-center text-center">${v.sub_tipo}</td>
                                    <td class="align-items-center text-center">
                                        5
                                    </td>
                                    <td class="align-items-center text-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                            <label class="custom-control-label" for="esp-${v.id}"></label>
                                        </div>
                                    </td>
                                    <td class="align-items-center text-center">
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                    </td>
                                </tr>
                                `);
                            });
                            $(otras_especialidades).each(function(i, v) { // indice, valor
                                $('#otros_profesionales_cm tbody').append(`
                                <tr>
                                    <td class="align-items-center text-center">${v.nombre}</td>
                                    <td class="align-items-center text-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                            <label class="custom-control-label" for="esp-${v.id}"></label>
                                        </div>
                                    </td>
                                    <td class="align-items-center text-center">
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_otra_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                    </td>
                                </tr>
                                `);
                            });
                        }
                        else
                        {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar especialidad",
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
                            text: "Error al cargar ingresar especialidad",
                            icon: "error",
                            buttons: "[Aceptar], [Cancelar]",
                            DangerMode: true,
                        });
                    }
                });
            }
        }

        function dame_especialidad_cm(id){
            console.log(id);
            $('#id_especialidad_cm').val(id);
            // Construye la URL con la id adjunta
            var url = "{{ url('Administrador/dame_especialidad') }}/" + id;
            $.ajax({
                url: url,
                type: "get",
            })
            .done(function(data) {
                // abrir modal
            $('#editar_especialidad').modal('show');
                console.log(data);
                if (data != null) {
                    $('#id_lugar_atencion').val(data.id_lugar_atencion);
                    $('#id_institucion').val(data.id_institucion);
                    $('#editar_especialidad_id').val(data.id);
                    $('#editar_especialidad_nombre').val(data.id_tipo_especialidad);
                    $('#editar_especialidad_sub_tipo').val(data.sub_tipo);
                    $('#editar_especialidad_num_profesionales').val(data.num_profesionales);
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar especialidad",
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

        function eliminar_especialidad_cm(id){
            // preguntar si desea eliminar
            swal({
                title: "Eliminar Especialidad",
                text: "¿Está seguro que desea eliminar la especialidad?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_eliminar_especialidad_cm(id);
                }
            });

        }

        function confirmar_eliminar_especialidad_cm(id){
            let id_institucion = $('#id_institucion').val();
            let data = {
                id_institucion : id_institucion,
                id : id,
                _token: CSRF_TOKEN,
            };
            let url = "{{ route('adm_cm.eliminar_especialidad') }}";
            $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if(data.estado == 1)
                    {
                        let especialidades = data.especialidades;
                        $('#especialidades_cm tbody').empty();
                        $(especialidades).each(function(i, v) { // indice, valor
                            $('#especialidades_cm tbody').append(`
                            <tr>
                                <td class="align-items-center text-center">${v.nombre}</td>
                                <td class="align-items-center text-center">${v.sub_tipo}</td>
                                    <td class="align-items-center text-center">
                                        ${v.num_profesionales}
                                    </td>
                                <td class="align-items-center text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="esp-${v.id}" onchange="cambiarEstadoEspecialidad(${v.id})" ${v.estado == 1 ? 'checked' : ''}>
                                        <label class="custom-control-label" for="esp-${v.id}"></label>
                                    </div>
                                </td>
                                <td class="align-items-center text-center">
                                    <button type="button" class="btn btn-outline-warning btn-sm btn-icon" onclick="editar_especialidad_cm(${v.id})"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar especialidad",
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
                        text: "Error al cargar ingresar especialidad",
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

        function eliminar_otra_especialidad_cm(id){
            // preguntar si desea eliminar
            swal({
                title: "Eliminar Especialidad",
                text: "¿Está seguro que desea eliminar la especialidad?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_eliminar_otra_especialidad_cm(id);
                }
            });

        }

        function confirmar_eliminar_otra_especialidad_cm(id){
            let id_institucion = $('#id_institucion').val();
            let data = {
                id_institucion : id_institucion,
                id : id,
                _token: CSRF_TOKEN,
            };
            let url = "{{ route('adm_cm.eliminar_otra_especialidad') }}";
            $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if(data.estado == 1)
                    {
                        let especialidades = data.especialidades;
                        let otras_especialidades = data.otras_especialidades;
                        $('#especialidades_cm tbody').empty();
                        $('#otros_profesionales_cm tbody').empty();
                        $(especialidades).each(function(i, v) { // indice, valor
                            $('#especialidades_cm tbody').append(`
                            <tr>
                                <td class="align-items-center text-center">${v.nombre}</td>
                                <td class="align-items-center text-center">5</td>
                                <td class="align-items-center text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                        <label class="custom-control-label" for="esp-${v.id}"></label>
                                    </div>
                                </td>
                                <td class="align-items-center text-center">
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                        $(otras_especialidades).each(function(i, v) { // indice, valor
                            $('#otros_profesionales_cm tbody').append(`
                            <tr>
                                <td class="align-items-center text-center">${v.nombre}</td>
                                <td class="align-items-center text-center">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="esp-${v.id}">
                                        <label class="custom-control-label" for="esp-${v.id}"></label>
                                    </div>
                                </td>
                                <td class="align-items-center text-center">
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_otra_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar especialidad",
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
                        text: "Error al cargar ingresar especialidad",
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

        function buscar_tipo_especialidad(id='')
        {
            let tipo_especialidad_registro = $('#agregar_profesional_nuevo_especialidad');
            tipo_especialidad_registro.find('option').remove();

            let sub_tipo_especialidad_registro = $('#agregar_profesional_nuevo_sub_tipo_especialidad');
            sub_tipo_especialidad_registro.find('option').remove();

            let especialidad = $('#especialidad_cm').val();
            console.log(especialidad);
            let url = "{{ route('home.buscar_especialidad') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    especialidad: especialidad,
                },
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    data = JSON.parse(data);
                    console.log(data);
                    let especialidades = $('#tipo_especialidad_cm');

                    especialidades.find('option').remove();
                    especialidades.append('<option value="">Seleccione</option>');
                    if(data.length > 0)
                    {
                        $(data).each(function(i, v) { // indice, valor
                            especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })
                    }
                    else
                    {
                        especialidades.append('<option value="0">No Aplica</option>');
                        especialidades.val(0);

                        let sub_especialidades = $('#agregar_profesional_nuevo_sub_tipo_especialidad');
                        sub_especialidades.append('<option value="0">No Aplica</option>');
                        sub_especialidades.val(0);
                    }
                    if(id != '')
                        especialidades.val(id);


                } else {
                    alert('No se pudo Cargar los tipos de especialidad');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

    function buscar_sub_tipo_especialidad(id='')
    {
        let sub_tipo_especialidad_registro = $('#agregar_profesional_nuevo_sub_tipo_especialidad');
        sub_tipo_especialidad_registro.find('option').remove();

        let especialidad = $('#especialidad_cm').val();
        console.log(especialidad);
        let url = "{{ route('home.buscar_sub_tipo_especialidad') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                especialidad: especialidad,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);
                console.log(data.length);
                let sub_especialidades = $('#sub_tipo_especialidad_cm');

                sub_especialidades.find('option').remove();
                sub_especialidades.append('<option value="">Seleccione</option>');
                if(data.length > 0)
                {
                    $(data).each(function(i, v) { // indice, valor
                        sub_especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    })
                }
                else
                {
                    sub_especialidades.append('<option value="0">No Aplica</option>');
                    sub_especialidades.val(0);
                }
                if(id != '')
                    sub_especialidades.val(id);

            } else {
                alert('No se pudo Cargar los tipos de especialidad');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cambiarEstadoEspecialidad(id){
        let estado = $('#esp-'+id).prop('checked');
        if(estado)
            estado = 1;
        else
            estado = 0;
        let id_institucion = $('#id_institucion').val();
        let data = {
            id : id,
            estado : estado,
            id_institucion : id_institucion,
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('adm_cm.cambiar_estado_especialidad') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {
                if(data.estado == 1)
                {
                    let especialidades = data.especialidades;
                    $('#especialidades_cm tbody').empty();
                    $(especialidades).each(function(i, v) { // indice, valor
                        $('#especialidades_cm tbody').append(`
                        <tr>
                            <td class="align-items-center text-center">${v.nombre}</td>
                            <td class="align-items-center text-center">${v.sub_tipo}</td>
                            <td class="align-items-center text-center">
                                ${v.num_profesionales}
                            </td>
                            <td class="align-items-center text-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="esp-${v.id}" onchange="cambiarEstadoEspecialidad(${v.id})" ${v.estado == 1 ? 'checked' : ''}>
                                    <label class="custom-control-label" for="esp-${v.id}"></label>
                                </div>
                            </td>
                            <td class="align-items-center text-center">
                                <button type="button" class="btn btn-outline-warning btn-sm btn-icon" onclick="dame_especialidad_cm(${v.id})"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                            </td>
                        </tr>
                        `);
                    });
                    swal({
                        title: "Estado Cambiado",
                        text: "Estado Cambiado Correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cambiar estado",
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
                    text: "Error al cambiar estado",
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

    function editar_direccion_medica(id_institucion){
        let cargo = $('#cargo').val();
        let responsable = $('#responsable_cargo').val();

        // validar campos
        if(cargo == '' || cargo == 0)
        {
            swal({
                title: "Error",
                text: "Campo Cargo es requerido",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return;
        }
        if(responsable == '' || responsable == 0)
        {
            swal({
                title: "Error",
                text: "Campo Responsable es requerido",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return;
        }

        let data = {
            cargo : cargo,
            responsable : responsable,
            id_institucion : id_institucion,
            _token: CSRF_TOKEN,
        }

        console.log(data);

        let url = "{{ route('adm_cm.editar_direccion_medica') }}";

        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {
                if(data.estado == 1)
                {
                    // cerrar modal
                    $('#a_area').modal('hide');
                    swal({
                        title: "Dirección Médica",
                        text: "Dirección Médica Actualizada Correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                    $('#contenedor_administradores_cm').empty();
                    $('#contenedor_administradores_cm').html(data.v);
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar área profesional",
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
                    text: "Error al cargar ingresar área profesional",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
    }

    function eliminar_area_cm(id){
        swal({
            title: "Eliminar Área Profesional",
            text: "¿Está seguro que desea eliminar el área profesional?",
            icon: "warning",
            buttons: ["Cancelar", "Aceptar"],
            DangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_area_profesional(id);
            }
        });
    }

    function confirmar_eliminar_area_profesional(id){
        let data = {
            id : id,
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('adm_cm.eliminar_area_profesional') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {
                if(data.estado == 1)
                {
                    let areas = data.areas;
                    $('#area_cm tbody').empty();
                    $(areas).each(function(i, v) { // indice, valor
                        $('#area_cm tbody').append(`
                        <tr>
                            <td class="align-items-left text-left">${v.tipo_area}</td>
                            <td class="align-items-left text-left">${v.nombre} ${v.apellido_uno} ${v.apellido_dos}</td>
                            <td class="align-items-left text-left">
                                <button type="button" class="btn btn-outline-warning btn-sm btn-icon" onclick="dame_area_profesionale(${v.id})"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_area_cm(${v.id})"><i class="feather icon-trash"></i></button>
                            </td>
                        </tr>
                        `);
                    });
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar área profesional",
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
                    text: "Error al cargar ingresar área profesional",
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

    function editar_especialidad_cm(){
        var numero_profesionales = $('#editar_especialidad_num_profesionales').val();
        var id_especialidad_cm = $('#id_especialidad_cm').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_institucion = $('#id_institucion').val();

        var url = "{{ route('adm_cm.editar_especialidad') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                id_especialidad_cm : id_especialidad_cm,
                numero_profesionales : numero_profesionales,
                id_lugar_atencion : id_lugar_atencion,
                id_institucion : id_institucion,
                _token: CSRF_TOKEN,
            },
            success: function(data){
                console.log(data);
            if (data != null) {
                if(data.estado == 1)
                {
                    // cerrar modal
                    $('#editar_especialidad').modal('hide');
                    let especialidades = data.especialidades;
                    $('#especialidades_cm tbody').empty();
                    $(especialidades).each(function(i, v) { // indice, valor
                                $('#especialidades_cm tbody').append(`
                                <tr>
                                    <td class="align-items-center text-center">${v.nombre}</td>
                                    <td class="align-items-center text-center">${v.sub_tipo}</td>
                                    <td class="align-items-center text-center">
                                        ${v.num_profesionales}
                                    </td>
                                    <td class="align-items-center text-center">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="esp-${v.id}" onchange="cambiarEstadoEspecialidad(${v.id})" ${v.estado == 1 ? 'checked' : ''}>
                                            <label class="custom-control-label" for="esp-${v.id}"></label>
                                        </div>
                                    </td>
                                    <td class="align-items-center text-center">
                                        <button type="button" class="btn btn-outline-warning btn-sm btn-icon" onclick="dame_especialidad_cm(${v.id})"><i class="fas fa-edit"></i></button>
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                    </td>
                                </tr>
                                `);
                            });
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar área profesional",
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
                    text: "Error al cargar ingresar área profesional",
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
            },
            error: function(jqXHR, ajaxOptions, thrownError){
                console.log(jqXHR, ajaxOptions, thrownError);
            }
        });
    }

    function mostrar_div_servicio(){
        $('#div_form_servicio').toggleClass('d-none');
    }

    function guardar_nuevo_servicio(){
        let nombre_servicio = $('#nombre_servicio_').val();
        let rut_servicio = $('#rut_servicio').val();
        let telefono_servicio = $('#telefono_servicio').val();
        let email_servicio = $('#email_servicio').val();
        let direccion_servicio = $('#direccion_servicio').val();
        let id_responsable_servicio = $('#responsable_servicio').val();

        let valido = 1;
        let mensaje = '';

        // validar campos
        if(nombre_servicio == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Nombre\n';
        }
        if(rut_servicio == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Rut\n';
        }
        if(telefono_servicio == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Teléfono\n';
        }
        if(email_servicio == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Email\n';
        }
        if(direccion_servicio == '')
        {
            valido = 0;
            mensaje += 'Campo requerido Dirección\n';
        }
        if(id_responsable_servicio == '' || id_responsable_servicio == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido Responsable\n';
        }

        if(valido == 1)
        {
            let data = {
                nombre_servicio : nombre_servicio,
                rut_servicio : rut_servicio,
                telefono_servicio : telefono_servicio,
                email_servicio : email_servicio,
                direccion_servicio : direccion_servicio,
                id_responsable_servicio : id_responsable_servicio,
                _token: CSRF_TOKEN,
            }

            let url = "{{ route('adm_cm.registrar_servicio') }}";

            $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if(data.estado == 1)
                    {
                        // cerrar modal
                        $('#a_servicio').modal('hide');
                        let servicios = data.servicios;
                        $('#servicios_cm tbody').empty();
                        $(servicios).each(function(i, v) { // indice, valor
                            $('#servicios_cm tbody').append(`
                            <tr>
                                <td class="align-items-left text-left">${v.nombre}</td>
                                <td class="align-items-left text-left">${v.rut}</td>
                                <td class="align-items-left text-left">${v.telefono}</td>
                                <td class="align-items-left text-left">${v.email}</td>
                                <td class="align-items-left text-left">
                                    <button type="button" class="btn btn-outline-warning btn-sm btn-icon" onclick="dame_servicio(${v.id})"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_servicio_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar servicio",
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
                        text: "Error al cargar ingresar servicio",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })

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

    function guardar_servicio(){
        let id_servicio = $('#servicio').val();
        let id_responsable = $('#responsable_servicio').val();
        id_servicio = parseInt(id_servicio);
        id_responsable = parseInt(id_responsable);
        let valido = 1;
        let mensaje = '';
        // validar campos
        if(id_servicio == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido Servicio\n';
        }
        if(id_responsable == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido Responsable\n';
        }


        if(valido == 1)
        {
            let data = {
                id_servicio : id_servicio,
                id_responsable : id_responsable,
                _token: CSRF_TOKEN,
            }

            let url = "{{ route('adm_cm.registrar_servicio_cm') }}";

            $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if(data.estado == 1)
                    {
                        // cerrar modal
                        $('#a_servicio').modal('hide');
                        let servicios = data.servicios_internos;
                        $('#servicios_cm tbody').empty();
                        $(servicios).each(function(i, v) { // indice, valor
                            $('#servicios_cm tbody').append(`
                            <tr>
                                <td class="align-items-left text-left">${v.nombre}</td>
                                <td class="align-items-left text-left">${v.nombre_responsable} ${v.apellido_uno_responsable} ${v.apellido_dos_responsable}</td>
                                <td class="align-items-left text-left">
                                    <button type="button" class="btn btn-outline-warning btn-sm btn-icon" onclick="dame_servicio(${v.id})"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_servicio_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar servicio",
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
                        text: "Error al cargar ingresar servicio",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })

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

    function eliminar_servicio_cm(id){
        swal({
            title: "Eliminar Servicio",
            text: "¿Está seguro que desea eliminar el servicio?",
            icon: "warning",
            buttons: ["Cancelar", "Aceptar"],
            DangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_servicio(id);
            }
        });
    }

    function confirmar_eliminar_servicio(id){
        let data = {
            id : id,
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('adm_cm.eliminar_servicio_cm') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {
                if(data.estado == 1)
                {
                    let servicios = data.servicios_internos;
                    $('#servicios_cm tbody').empty();
                    $(servicios).each(function(i, v) { // indice, valor
                        $('#servicios_cm tbody').append(`
                        <tr>
                            <td class="align-items-left text-left">${v.nombre}</td>
                            <td class="align-items-left text-left">${v.nombre_responsable} ${v.apellido_uno_responsable} ${v.apellido_dos_responsable}</td>
                            <td class="align-items-left text-left">
                                <button type="button" class="btn btn-outline-warning btn-sm btn-icon" onclick="dame_servicio(${v.id})"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_servicio_cm(${v.id})"><i class="feather icon-trash"></i></button>
                            </td>
                        </tr>
                        `);
                    });
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar servicio",
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
                    text: "Error al cargar ingresar servicio",
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

    function dame_area_cm(id,id_lugar_atencion){
        // Construye la URL con la id adjunta
        var url = "{{ url('Administrador/dame_area') }}/" + id+"/"+id_lugar_atencion;
        $.ajax({
            url: url,
            type: "get",
        })
        .done(function(data) {
            // abrir modal
            $('#editar_area').modal('show');
            console.log(data);
            if (data != null) {

                $('#editar_responsable option:selected').removeAttr('selected');
                $('#editar_responsable option[value="'+data+'"]').attr('selected', 'selected');
            }
            else
            {
                swal({
                    title: "Error",
                    text: "Error al cargar ingresar área profesional",
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

    function editar_area_cm(id_lugar_atencion){
        let id_responsable = $('#editar_responsable').val();
        let id_area = $('#id_area').val();
    }

    function eliminar_admin_cm(tipo_admin, id_institucion){
        swal({
            title: "Eliminar Administrador",
            text: "¿Está seguro que desea eliminar el administrador?",
            icon: "warning",
            buttons: ["Cancelar", "Aceptar"],
            DangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_admin_cm(tipo_admin, id_institucion);
            }
        });
    }

    function confirmar_eliminar_admin_cm(tipo_admin, id_institucion){
        let data = {
            tipo_admin : tipo_admin,
            id_institucion : id_institucion,
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('adm_cm.eliminar_admin_cm') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {
                if(data.estado == 1)
                {
                    swal({
                        title: "Administrador",
                        text: "Administrador Eliminado Correctamente",
                        icon: "success",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                    $('#contenedor_administradores_cm').empty();
                    $('#contenedor_administradores_cm').html(data.v);
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar administrador",
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
                    text: "Error al cargar ingresar administrador",
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

    function guardar_procedimiento(){
        let nombre = $('#a_procedimeinto_nombre').val();
        let descripcion = $('#a_procedimeinto_descripcion').val();
        let cantidad_bloques = $('#a_procedimeinto_cantidad_bloques').val();
        let valor = $('#a_procedimeinto_valor').val();
        let valido = 1;
        let mensaje = '';
        // validar campos
        if(nombre == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido nombre\n';
        }
        // if(descripcion == 0)
        // {
        //     valido = 0;
        //     mensaje += 'Campo requerido descripcion\n';
        // }
        if(cantidad_bloques == 0)
        {
            valido = 0;
            mensaje += 'Campo requerido cantidad bloques\n';
        }


        if(valido == 1)
        {
            let data = {
                id_lugar_atencion : '{{ $institucion->id_lugar_atencion }}',
                nombre : nombre,
                descripcion : descripcion,
                minutos_bloque : 15,
                cantidad_bloques : cantidad_bloques,
                valor : valor,
                otros : '',
                _token: CSRF_TOKEN,
            }

            let url = "{{ route('adm_cm.procedimiento.registrar') }}";

            $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if(data.estado == 1)
                    {
                        // cerrar modal
                        $('#a_procedimiento').modal('hide');
                        let registros = data.registros;
                        $('#procedimiento_cm tbody').empty();
                        $(registros).each(function(i, v) { // indice, valor
                            $('#procedimiento_cm tbody').append(`
                            <tr>
                                <td class="align-items-left text-left">${v.nombre}s</td>
                                <td class="align-items-left text-left">${v.descripcion}</td>
                                <td class="align-items-left text-left">${v.cantidad_bloques}</td>
                                <td class="align-items-left text-left">${v.valor}</td>
                                <td class="align-items-left text-left">
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_procedimiento_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                    }
                    else
                    {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar Procedimiento",
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
                        text: "Error al cargar ingresar Procedimiento",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })

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

    function eliminar_procedimiento_cm(id){
        swal({
            title: "Eliminar procedimiento",
            text: "¿Está seguro que desea eliminar el procedimiento?",
            icon: "warning",
            buttons: ["Cancelar", "Aceptar"],
            DangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                confirmar_eliminar_procedimiento(id);
            }
        });
    }

    function confirmar_eliminar_procedimiento(id){
        let data = {
            id : id,
            estado : '0',
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('adm_cm.procedimiento.modificar') }}";
        $.ajax({
            url: url,
            type: "post",
            data: data,
        })
        .done(function(data) {
            console.log(data);
            if (data != null) {
                if(data.estado == 1)
                {
                    let registros = data.registros;
                    $('#procedimiento_cm tbody').empty();
                    $(registros).each(function(i, v) { // indice, valor
                        $('#procedimiento_cm tbody').append(`
                        <tr>
                            <td class="align-items-left text-left">${v.nombre}s</td>
                            <td class="align-items-left text-left">${v.descripcion}</td>
                            <td class="align-items-left text-left">${v.cantidad_bloque}</td>
                            <td class="align-items-left text-left">${v.valor}</td>
                            <td class="align-items-left text-left">
                                <button type="button" class="btn btn-outline-danger btn-sm btn-icon" onclick="eliminar_procedimiento_cm(${v.id})"><i class="feather icon-trash"></i></button>
                            </td>
                        </tr>
                        `);
                    });
                }
                else
                {
                    swal({
                        title: "Error",
                        text: "Error al elimianr procedimiento",
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
                    text: "Error eliminar procedimiento",
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

    function añadir_bodega_nueva() {
        console.log('añadiendo bodega');
        $('#agregar_bodega').modal('show');
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
            formData.append('id_institucion','{{ $institucion->id }}');
            formData.append('_token', '{{ csrf_token() }}');

            // imprimir el formdata
            for (var pair of formData.entries()) {
                console.log(pair[0] + ': ' + pair[1]);
            }

            $.ajax({
                url: '{{ route("adm_cm.actualizar.foto") }}',
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
                            document.getElementById('profile-image_menu').src = response.foto_url;
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
                    console.error('Error:', error);
                    swal({
                        title: "Error",
                        text: "Error al subir la imagen. Inténtalo de nuevo.",
                        icon: "error",
                        buttons: "Aceptar",
                    });

                    // Revertir la imagen si hay error
                    document.getElementById('profile-image').src = '{{ $institucion->foto_perfil ? asset("storage/" . $institucion->foto_perfil) : asset("images/iconos/cm-perfiles.png") }}';
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
                        url: '{{ route("adm_cm.eliminar.foto") }}', // Necesitas crear esta ruta
                        method: 'POST',
                        data: {
                            'id_institucion': '{{ $institucion->id }}',
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
                                document.getElementById('profile-image').src = '{{ asset("images/iconos/cm-perfiles.png") }}';
                                document.getElementById('profile-image_menu').src = '{{ asset("images/iconos/cm-perfiles.png") }}';
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
