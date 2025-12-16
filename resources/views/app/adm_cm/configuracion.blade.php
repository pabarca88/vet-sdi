@extends('template.adm_cm.template')
@section('content')
    <!--****Container Completo****-->
    <style>
        .select2-container--open {
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
                                <h5 class="font-weight-bolder">Configurar mi institución</h5>
                            </div>
                            <ul class="breadcrumb mb-4">
                                <li class="breadcrumb-item">
                                    <a href="{{ ROUTE('adm_cm.home') }}" data-toggle="tooltip" data-placement="top"
                                        title="Volver a mi escritorio">
                                        <i class="feather icon-home"></i>
                                    </a>
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
            <input type="hidden" name="id_area" id="id_area" value="">
            <input type="hidden" name="id_laboratorio" id="id_laboratorio" value="">
            <input type="hidden" name="id_box" id="id_box" value="">
            <input type="hidden" name="id_director_cm" id="id_director_cm" value="{{ $director_cm->id }}">
            <input type="hidden" name="id_director_comercial" id="id_director_comercial" value="{{ isset($subdirector_cm) ? $subdirector_cm->id : '' }}">
            <input type="hidden" name="id_director_farmacia" id="id_director_farmacia" value="{{ isset($director_gestion_cuidado) ? $director_gestion_cuidado->id : '' }}">

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
                            <div class="col-md-12 mt-0">
                                <!-- tab general -->

                                <div class="user-about-block m-0">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset active" id="p-cm-tab" data-toggle="tab"
                                                        href="#p-cm" role="tab" aria-controls="p-cm"
                                                        aria-selected="false"><i class="feather icon-home mr-2"></i>Perfil
                                                        de la Institución</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset " id="p-adm-tab" data-toggle="tab"
                                                        href="#p-adm" role="tab" aria-controls="p-adm"
                                                        aria-selected="true"><i class="feather icon-user mr-2"></i>Perfil
                                                        administrador de la Institución</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="rol-permiso-adm-med-tab"
                                                        data-toggle="tab" href="#rol-permiso-adm-med" role="tab"
                                                        aria-controls="rol-permiso-adm-med" aria-selected="false"><i
                                                            class="feather  icon-lock mr-2"></i>Inscripción y manejo de
                                                        administradores</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="ar-dep-tab" data-toggle="tab"
                                                        href="#ar-dep" role="tab" aria-controls="ar-dep"
                                                        aria-selected="false"><i
                                                            class="fa-solid fa-stethoscope mr-2"></i>Especialidades y
                                                        áreas</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-reset" id="bodegas_serv-tab"
                                                        data-toggle="tab" href="#bodegas_serv" role="tab"
                                                        aria-controls="bodegas_serv" aria-selected="false"><i
                                                            class="feather icon-home mr-2"></i>Bodegas</a>
                                                </li>
                                                @if ($institucion->sucursales == 1)
                                                    <li class="nav-item">
                                                        <a class="nav-link text-reset" id="sucursales-tab"
                                                            data-toggle="tab" href="#sucursales" role="tab"
                                                            aria-controls="sucursales" aria-selected="false"><i
                                                                class="feather icon-home mr-2"></i>Sucursales</a>
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

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="myTabContent">

                        <!--PERFIL CENTRO MEDICO-->
                        <div class="tab-pane fade show active" id="p-cm" role="tabpanel"
                            aria-labelledby="p-cm-tab">
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
                                            <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right"
                                                data-toggle="collapse" data-target=".info_basica" aria-expanded="false"
                                                aria-controls="info_basica-1 info_basica-2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Datos Personales-->
                                        <div class="card-body info_basica collapse show" id="info_basica-1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Rut</label>
                                                        <div id="ver_rut">{{ $institucion->rut }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Razón social</label>
                                                        <div id="ver_razon_social">{{ $institucion->razon_social }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Nombre Fantasia</label>
                                                        <div id="ver_nombre">{{ $institucion->nombre }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Nº de inscripción
                                                            SuperSalud</label>
                                                        <div id="ver_certificado_supersalud">
                                                            {{ $institucion->certificado_supersalud }}</div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Datos Personales-->
                                        <!--(Editar)Datos Personales-->
                                        <div class="card-body info_basica collapse" id="pinfo_basica_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Rut</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Rut" id="editar_rut"
                                                            value="{{ $institucion->rut }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Razón Social</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Razón Social" id="editar_razon_social"
                                                            value="{{ $institucion->razon_social }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Nombre Fantasia</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Nombre" id="editar_nombre"
                                                            value="{{ $institucion->nombre }}">
                                                    </div>

                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Nº de inscripción
                                                            SuperSalud</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Nº de inscripción"
                                                            id="editar_certificado_supersalud"
                                                            value="{{ $institucion->certificado_supersalud }}">
                                                    </div>

                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class=" d-flex justify-content-end">
                                                            <button type="button" class="btn btn-sm btn-danger mr-2"
                                                                data-toggle="collapse" data-target=".info_basica"
                                                                aria-expanded="false"
                                                                aria-controls="info_basica-1 info_basica-2"><i
                                                                    class="feather icon-x"></i>Cancelar</button>
                                                            <button type="button" class="btn btn-sm btn-info"
                                                                onclick="editar_datos_institucion();"><i
                                                                    class="feather icon-save"></i> Guardar cambios</button>
                                                        </div>
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
                                            <h5 class="mb-0 text-white">Datos de contacto</h5>
                                            <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right"
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
                                                        <div id="ver_email">{{ $institucion->email }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Teléfono</label>
                                                        <div id="ver_telefono">{{ $institucion->telefono }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Whatsapp</label>
                                                        <div id="ver_whatsapp">{{ $institucion->whatsapp }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Sitio web</label>
                                                        <div id="ver_sitio_web">{{ $institucion->sitio_web }}</div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Contacto-->
                                        <!--(Editar) Contacto-->
                                        <div class="card-body info_contacto collapse" id="info_contacto_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Correo electrónico</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="editar_email" placeholder="Correo electrónico"
                                                            value="{{ $institucion->email }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Teléfono</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="editar_telefono" placeholder="Teléfono"
                                                            value="{{ $institucion->telefono }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Whatsapp</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="editar_whatsapp" placeholder="Whatsapp"
                                                            value="{{ $institucion->whatsapp }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Sitio web</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="editar_sitio_web" placeholder="Sitio web"
                                                            value="{{ $institucion->sitio_web }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn btn-sm btn-danger mr-2"><i
                                                                    class="feather icon-x"></i> Cancelar</button>
                                                            <button type="button" class="btn btn-sm btn-info"
                                                                onclick="editar_contacto_institucion();"><i
                                                                    class="feather icon-save"></i> Guardar cambios</button>
                                                        </div>
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
                                            <button type="button" class="btn btn-light btn-sm btn-icon m-0 float-right"
                                                data-toggle="collapse" data-target=".info_residencial"
                                                aria-expanded="false"
                                                aria-controls="info_residencial_1 info_residencial_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>

                                        <!--Ubicación-->
                                        <div class="card-body info_residencial collapse show" id="info_residencial_1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Región</label>
                                                        <div>
                                                            {{ $institucion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Comuna</label>
                                                        <div>
                                                            {{ $institucion->Direccion()->first()->Ciudad()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Dirección</label>
                                                        <div>
                                                            {{ $institucion->Direccion()->first()->direccion . ' ' . $institucion->Direccion()->first()->numero_dir }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Sucursales</label>
                                                        <div>
                                                            @if ($institucion->sucursales == 1)
                                                                Si Registra Sucursales
                                                            @else
                                                                No Registra Sucursales
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Ubicación-->
                                        <!--(Editar) Ubicación-->
                                        <div class="card-body info_residencial collapse " id="info_residencial_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Región</label>
                                                        <select class="form-control form-control-sm"
                                                            onchange="buscar_ciudad();" id="editar_region"
                                                            name="editar_region">
                                                            <option value="">Seleccione una Región</option>
                                                            @if (isset($regiones))
                                                                @foreach ($regiones as $region)
                                                                    <option value="{{ $region->id }}"
                                                                        @if ($region->id == $institucion->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                        {{ $region->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Comuna</label>
                                                        <select class="form-control form-control-sm" id="editar_ciudad"
                                                            name="editar_ciudad">
                                                            <option value="">Seleccione su comuna</option>
                                                            @if (isset($ciudades))
                                                                @foreach ($ciudades as $ciudad)
                                                                    @if ($institucion->Direccion()->first()->id_ciudad == $ciudad->id)
                                                                        <option value="{{ $ciudad->id }}" selected>
                                                                        @else
                                                                        <option value="{{ $ciudad->id }}">
                                                                    @endif

                                                                    {{ $ciudad->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                                        <label class="floating-label-activo-sm">Dirección</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="editar_direccion" id="editar_direccion"
                                                            value="{{ $institucion->Direccion()->first()->direccion }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                                        <label class="floating-label-activo-sm">Nº</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="editar_numero_dir" id="editar_numero_dir"
                                                            value="{{ $institucion->Direccion()->first()->numero_dir }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="col-form-label font-weight-bolder">Sucursal</label>
                                                        <div class="form-group">
                                                            <div class="switch switch-success d-inline m-r-10">
                                                                @if ($institucion->sucursales == 1)
                                                                    <input type="checkbox" id="editar_sucursal"
                                                                        checked="checked">
                                                                @else
                                                                    <input type="checkbox" id="editar_sucursal">
                                                                @endif
                                                                <label for="editar_sucursal" class="cr"></label>
                                                                <label>SI</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn btn-sm btn-danger mr-2"><i
                                                                    class="feather icon-save"></i> Cancelar</button>
                                                            <button type="button" class="btn btn-sm btn-info"
                                                                onclick="editar_direccion_institucion();"><i
                                                                    class="feather icon-save"></i> Guardar cambios</button>
                                                        </div>
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
                                            <input type="hidden" name="id_responsable" id="id_responsable"
                                                value="{{ $responsable->id }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <!--Card Información Básica-->
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Datos personales</h5>
                                            <button type="button" class="btn btn-light btn-icon m-0 float-right"
                                                data-toggle="collapse" data-target=".info_basica" aria-expanded="false"
                                                aria-controls="info_basica-1 info_basica-2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Datos Personales-->
                                        <div class="card-body info_basica collapse show" id="info_basica-1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Rut</label>
                                                        <div> {{ $responsable->rut }} </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Nombre</label>
                                                        <div> {{ $responsable->nombres }} </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Primer
                                                            Apellido</label>
                                                        <div> {{ $responsable->apellido_uno }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Segundo
                                                            Apellido</label>
                                                        <div> {{ $responsable->apellido_dos }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Sexo</label>
                                                        <div>
                                                            @if ($responsable->sexo == 'F')
                                                                Mujer
                                                            @elseif ($responsable->sexo == 'M')
                                                                Hombre
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Nacimiento</label>
                                                        <div>
                                                            {{ \Carbon\Carbon::parse($responsable->fecha_nac)->format('d-m-Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Datos Personales-->
                                        <!--(Editar)Datos Personales-->
                                        <div class="card-body info_basica collapse" id="pinfo_basica_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Rut</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="perfil_rut" name="perfil_rut"
                                                            value="{{ $responsable->rut }}" disabled>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Nombre</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="perfil_nombre" name="perfil_nombre"
                                                            value="{{ $responsable->nombres }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Primer Apellido</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="perfil_apellido_uno" name="perfil_apellido_uno"
                                                            value="{{ $responsable->apellido_uno }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Segundo Apellido</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="perfil_apellido_dos" name="perfil_apellido_dos"
                                                            value="{{ $responsable->apellido_dos }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Sexo</label>
                                                        <div class="form-check form-check-inline mt-3">
                                                            <input class="form-check-input" type="radio"
                                                                id="perfil_sexo" name="perfil_sexo" id="inlineRadio2"
                                                                value="F"
                                                                @if ($responsable->sexo == 'F') checked @endif>
                                                            <label class="form-check-label"
                                                                for="inlineRadio2">Mujer</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio"
                                                                id="perfil_sexo" name="perfil_sexo" id="inlineRadio1"
                                                                value="M"
                                                                @if ($responsable->sexo == 'M') checked @endif>
                                                            <label class="form-check-label"
                                                                for="inlineRadio1">Hombre</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Nacimiento</label>
                                                        <input type="date" class="form-control form-control-sm"
                                                            id="perfil_nac" name="perfil_nac"
                                                            value="{{ $responsable->fecha_nac }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger btn-sm mr-2"><i
                                                                    class="feather icon-x"></i> Cancelar</button>
                                                            <button type="button"
                                                                onclick="editar_responsable_datos_personales();"
                                                                class="btn btn-info btn-sm"><i
                                                                    class="feather icon-save"></i> Guardar cambios</button>
                                                        </div>
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
                                            <button type="button" class="btn btn-light btn-icon m-0 float-right"
                                                data-toggle="collapse" data-target=".pass_personal" aria-expanded="false"
                                                aria-controls="pass_personal_1 pass_personal_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Contraseña-->
                                        <div class="card-body pass_personal collapse show" id="pass_personal_1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Contraseña
                                                            actual</label>
                                                        <div> •••••••• </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Contraseña-->
                                        <!--(Editar)Contraseña-->
                                        <div class="card-body pass_personal collapse" id="pass_personal_2">
                                            <form method="get"
                                                action="{{ route('adm_cm.cambio_contrasena_responsable') }}"
                                                id="form_cambio_contrasena_perfil_responsable"
                                                name="form_cambio_contrasena_perfil_responsable">
                                                <input type="hidden" name="responsable_id" id="responsable_id"
                                                    value="{{ $responsable->Usuario()->first()->id }}">
                                                @csrf
                                                <div class="form-row">
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
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger btn-sm mr-2"><i
                                                                    class="feather icon-x"></i> Cancelar</button>
                                                            <button type="submit" class="btn btn-sm btn-info btn-sm"><i
                                                                    class="feather icon-save"></i> Guardar cambios</button>
                                                        </div>
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
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">
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
                                                            Electrónico</label>
                                                        <div> {{ $responsable->email }} </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Teléfono</label>
                                                        <div>{{ $responsable->telefono_uno }}</div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Teléfono</label>
                                                        <div>{{ $responsable->telefono_dos }}</div>
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
                                                        <label class="floating-label-activo-sm">Correo Electrónico</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="Perfil_email" name="Perfil_email"
                                                            value="{{ $responsable->email }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Celular</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="Perfil_fono" name="Perfil_fono"
                                                            value="{{ $responsable->telefono_uno }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Teléfono</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            id="Perfil_fono_dos" name="Perfil_fono_dos"
                                                            value="{{ $responsable->telefono_dos }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="col-sm-12 d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger btn-sm mr-2"><i
                                                                    class="feather icon-x"></i> Cancelar</button>
                                                            <button type="button"
                                                                onclick="editar_responsable_datos_contacto()"
                                                                class="btn btn-info btn-sm"><i
                                                                    class="feather icon-save"></i> Guardar cambios</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--(Editar) Contacto-->
                                    </div>
                                    <!--Cierre: Card Contacto-->
                                    <!--Card Residencia-->
                                    <div class="card">
                                        <div class="card-header d-flex align-items-center justify-content-between bg-info">
                                            <h5 class="mb-0 text-white">Residencia</h5>
                                            <button type="button" class="btn btn-light btn-icon m-0 float-right"
                                                data-toggle="collapse" data-target=".info_residencial_"
                                                aria-expanded="false"
                                                aria-controls="info_residencial_1 info_residencial_2">
                                                <i class="feather icon-edit"></i>
                                            </button>
                                        </div>
                                        <!--Residencia-->
                                        <div class="card-body info_residencial_ collapse show" id="info_residencial_1">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Región</label>
                                                        <div>
                                                            {{ $responsable->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Comuna</label>
                                                        <div>
                                                            {{ $responsable->Direccion()->first()->Ciudad()->first()->nombre }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="font-weight-bolder ml-0 mb-0">Dirección</label>
                                                        <div>
                                                            {{ $responsable->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--Cierre: Residencia-->
                                        <!--(Editar) Residencia-->
                                        <div class="card-body info_residencial_ collapse " id="info_residencial_2">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Región</label>
                                                        <select class="form-control form-control-sm"
                                                            onchange="buscar_ciudad_responsable();" id="perfil_region"
                                                            name="perfil_region">
                                                            <option value="">Seleccione una Región</option>
                                                            @if (isset($regiones))
                                                                @foreach ($regiones as $region)
                                                                    <option value="{{ $region->id }}"
                                                                        @if ($region->id == $responsable->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                        {{ $region->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Ciudad</label>
                                                        <select class="form-control form-control-sm" id="perfil_ciudad"
                                                            name="perfil_ciudad">
                                                            <option value="">Seleccione su comuna</option>
                                                            @if (isset($ciudades))
                                                                @foreach ($ciudades as $ciudad)
                                                                    <option value="{{ $ciudad->id }}"
                                                                        @if ($responsable->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
                                                                        {{ $ciudad->nombre }}
                                                                    </option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Dirección</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="perfil_dire" id="perfil_dire"
                                                            value="{{ $responsable->Direccion()->first()->direccion }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <label class="floating-label-activo-sm">Nº</label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            name="perfil_numero_dir" id="perfil_numero_dir"
                                                            value="{{ $responsable->Direccion()->first()->numero_dir }}">
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger btn-sm mr-2"><i
                                                                    class="feather icon-x"></i> Cancelar</button>
                                                            <button type="button"
                                                                onclick="editar_responsable_datos_residencia();"
                                                                class="btn btn-info btn-sm"><i
                                                                    class="feather icon-save"></i> Guardar cambios</button>
                                                        </div>
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

                        <!--INSCRIPCION Y MANEJO DE ADM-->
                        <div class="tab-pane fade" id="rol-permiso-adm-med" role="tabpanel"
                            aria-labelledby="rol-permiso-adm-med-tab">
                            <div class="row mb-0 mt-0">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card mb-1">
                                        <div class="card-body pb-2">
                                            <h4 class="f-18 mb-0 text-info py-0 d-inline">Perfil administradores médicos de
                                                la Institución</h4>
                                            <div class="d-inline float-md-right">
                                                <button type="button" class="btn btn-sm btn-info"
                                                    onclick="ag_area();"><i class="feather icon-plus"
                                                        aria-hidden="true"></i> Administrar</button>
                                            </div>
                                            @if (isset($director_cm) && $director_cm != null)
                                                <input type="hidden" name="id_responsable" id="id_director_cm"
                                                    value="{{ $director_cm->id }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs-secciones-info" id="insc-institucion" role="tablist">
                                        <li class="nav-item-secciones-info">
                                            <a class="nav-secciones-info text-uppercase active" id="p-director-tab"
                                                data-toggle="tab" href="#p-director" role="tab"
                                                aria-controls="p-director" aria-selected="true">Perfil director médico</a>
                                        </li>
                                        <li class="nav-item-secciones-info">
                                            <a class="nav-secciones-info text-uppercase" id="p-comercial-tab"
                                                data-toggle="tab" href="#p-comercial" role="tab"
                                                aria-controls="p-comercial" aria-selected="false">Perfil Adm.
                                                comercial</a>
                                        </li>
                                        <li class="nav-item-secciones-info">
                                            <a class="nav-secciones-info text-uppercase" id="p-farmacia-tab"
                                                data-toggle="tab" href="#p-farmacia" role="tab"
                                                aria-controls="p-farmacia" aria-selected="false">Perfil Adm. Farmacia</a>
                                        </li>
                                        <!--<li class="nav-item-secciones-info">
                                            <a class="nav-secciones-info text-uppercase" id="laboratorio-i-tab" data-toggle="tab" href="#laboratorio-i" role="tab" aria-controls="laboratorio-i" aria-selected="false"></a>
                                        </li>-->
                                    </ul>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content" id="agregar_inf_cm">
                                        <div class="tab-pane fade show active" id="p-director" role="tabpanel"
                                            aria-labelledby="p-director-tab">
                                            @if (isset($director_cm) && $director_cm != null)
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="card">
                                                        <div
                                                            class="card-header d-flex align-items-center justify-content-between bg-info">
                                                            <h5 class="mb-0 text-white">Perfil Director Médico</h5>
                                                            <div class="float-md-right d-inline">
                                                                <button type="button" class="btn btn-light btn-icon"
                                                                    data-toggle="collapse"
                                                                    data-target=".info_basica_director_cm"
                                                                    aria-expanded="false"
                                                                    aria-controls="info_basica-1_ info_basica-2">
                                                                    <i class="feather icon-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    onclick="eliminar_admin_cm(1,{{ $institucion->id }})"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </div>
                                                        </div>
                                                        <!--Datos Personales-->
                                                        <div class="card-body info_basica_director_cm collapse show"
                                                            id="info_basica-1_">
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--DATOS PERSONALES-->
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    DATOS PERSONALES</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Rut</label>
                                                                                <div class="" id="rut_director_medico">
                                                                                    {{ $director_cm->rut }} </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Nombre</label>
                                                                                <div class="" id="nombre_director_medico">
                                                                                    {{ $director_cm->nombre }} </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Primer
                                                                                    Apellido</label>
                                                                                <div id="apellido_uno_director_medico"> {{ $director_cm->apellido_uno }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Segundo
                                                                                    Apellido</label>
                                                                                <div id="apellido_dos_director_medico"> {{ $director_cm->apellido_dos }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Sexo</label>
                                                                                <div id="sexo_director_medico">
                                                                                    @if ($director_cm->sexo == 'F')
                                                                                        Mujer
                                                                                    @elseif ($director_cm->sexo == 'M')
                                                                                        Hombre
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Nacimiento</label>
                                                                                <div id="fecha_nacimiento_director_medico">
                                                                                    {{ \Carbon\Carbon::parse($director_cm->fecha_nacimiento)->format('d-m-Y') }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--CONTACTO-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    CONTACTO</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Correo
                                                                                    Electrónico</label>
                                                                                <div id="email_director_medico"> {{ $director_cm->email }} </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Celular</label>
                                                                                <div id="telefono_uno_director_medico">{{ $director_cm->telefono_uno }}</div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Teléfono</label>
                                                                                <div id="telefono_dos_director_medico">{{ $director_cm->telefono_dos }}</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--RESIDENCIA-->
                                                                        <div class="form-row mtop-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    RESIDENCIA</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Región</label>
                                                                                <div id="region_director_medico">
                                                                                    {{ $director_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Comuna</label>
                                                                                <div id="comuna_director_medico">
                                                                                    {{ $director_cm->Direccion()->first()->Ciudad()->first()->nombre }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Dirección</label>
                                                                                <div id="direccion_director_medico">
                                                                                    {{ $director_cm->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--CONTRASEÑA-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    CONTRASEÑA</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Contraseña
                                                                                    actual</label>
                                                                                <div> •••••••• </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Cierre: Datos Personales-->
                                                        <!--(Editar)Datos Personales-->
                                                        <div class="card-body  info_basica_director_cm collapse"
                                                            id="pinfo_basica_2">
                                                            <form>
                                                                <!--NUEVO EDITAR-->
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--EDITAR DATOS PERSONALES-->
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <p class="font-weight-bolder">DATOS
                                                                                    PERSONALES</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Rut</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_rut_director_medico"
                                                                                    name="perfil_rut_director_medico"
                                                                                    value="{{ $director_cm->rut }}"
                                                                                    disabled>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Nombre</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_nombre_director_medico"
                                                                                    name="perfil_nombre_director_medico"
                                                                                    value="{{ $director_cm->nombre }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Primer
                                                                                    Apellido</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_apellido_uno_director_medico"
                                                                                    name="perfil_apellido_uno_director_medico"
                                                                                    value="{{ $director_cm->apellido_uno }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Segundo
                                                                                    Apellido</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_apellido_dos_director_medico"
                                                                                    name="perfil_apellido_dos_director_medico"
                                                                                    value="{{ $director_cm->apellido_dos }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Sexo</label>
                                                                                <div
                                                                                    class="form-check form-check-inline mt-3">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        id="perfil_sexo_director_medico"
                                                                                        name="perfil_sexo_director_medico"
                                                                                        id="inlineRadio2" value="F"
                                                                                        @if ($director_cm->sexo == 'F') checked @endif>
                                                                                    <label class="form-check-label"
                                                                                        for="inlineRadio2">Mujer</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        id="perfil_sexo_director_medico"
                                                                                        name="perfil_sexo_director_medico"
                                                                                        id="inlineRadio2" value="M"
                                                                                        @if ($director_cm->sexo == 'M') checked @endif>
                                                                                    <label class="form-check-label"
                                                                                        for="inlineRadio1">Hombre</label>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Nacimiento</label>
                                                                                <input type="date"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_nac_director_medico"
                                                                                    name="perfil_nac_director_medico"
                                                                                    value="{{ $director_cm->fecha_nacimiento }}">
                                                                            </div>
                                                                        </div>
                                                                        <!--EDITAR CONTACTO-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <p class="font-weight-bolder">CONTACTO</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Correo
                                                                                    electrónico</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_email_director_medico" name="perfil_email_director_medico"
                                                                                    value="{{ $director_cm->email }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Celular</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_fono_director_medico" name="perfil_fono_director_medico"
                                                                                    value="{{ $director_cm->telefono_uno }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Teléfono</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_fono_dos_director_medico"
                                                                                    name="perfil_fono_dos_director_medico"
                                                                                    value="{{ $director_cm->telefono_dos }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--EDITAR RESIDENCIA-->
                                                                        <div class="form-row mtop-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <p class="font-weight-bolder">RESIDENCIA
                                                                                </p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Región</label>
                                                                                <select
                                                                                    class="form-control form-control-sm"
                                                                                    onchange="buscar_ciudad_responsable();"
                                                                                    id="perfil_region_director_medico"
                                                                                    name="perfil_region_director_medico">
                                                                                    <option value="">Seleccione una
                                                                                        Región</option>
                                                                                    @if (isset($regiones))
                                                                                        @foreach ($regiones as $region)
                                                                                            <option
                                                                                                value="{{ $region->id }}"
                                                                                                @if ($region->id == $director_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                                                {{ $region->nombre }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Comuna</label>
                                                                                <select
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_ciudad_director_medico"
                                                                                    name="perfil_ciudad_director_medico">
                                                                                    <option value="">Seleccione su
                                                                                        comuna</option>
                                                                                    @if (isset($ciudades))
                                                                                        @foreach ($ciudades as $ciudad)
                                                                                            <option
                                                                                                value="{{ $ciudad->id }}"
                                                                                                @if ($director_cm->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
                                                                                                {{ $ciudad->nombre }}
                                                                                            </option>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </select>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Dirección</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="perfil_dire_director_medico" id="perfil_dire_director_medico"
                                                                                    value="{{ $director_cm->Direccion()->first()->direccion }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Nº</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    name="perfil_numero_dir_director_medico"
                                                                                    id="perfil_numero_dir_director_medico"
                                                                                    value="{{ $director_cm->Direccion()->first()->numero_dir }}">
                                                                            </div>
                                                                        </div>
                                                                        <!--EDITAR CONTRASEÑA-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <p class="font-weight-bolder">CONTRASEÑA
                                                                                </p>
                                                                            </div>
                                                                            <form method="get"
                                                                                action="{{ route('adm_cm.cambio_contrasena_responsable') }}"
                                                                                id="form_cambio_contrasena_perfil_responsable"
                                                                                name="form_cambio_contrasena_perfil_responsable">
                                                                                <input type="hidden"
                                                                                    name="responsable_id"
                                                                                    id="responsable_id"
                                                                                    value="{{ $responsable->Usuario()->first()->id }}">
                                                                                @csrf
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Contraseña
                                                                                        actual</label>
                                                                                    <input type="password"
                                                                                        class="form-control form-control-sm"
                                                                                        name="responsable_actual"
                                                                                        id="responsable_actual">
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Nueva
                                                                                        contraseña</label>
                                                                                    <input type="password"
                                                                                        class="form-control form-control-sm"
                                                                                        name="responsable_nueva"
                                                                                        id="responsable_nueva">
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Repitir
                                                                                        contraseña</label>
                                                                                    <input type="password"
                                                                                        class="form-control form-control-sm"
                                                                                        name="responsable_validacion"
                                                                                        id="responsable_validacion">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-12 col-form-label"></label>
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm mr-2"><i
                                                                                class="feather icon-x"></i>
                                                                            Cancelar</button>
                                                                        <button type="button"
                                                                            onclick="editar_responsable_medico_datos_personales('director_medico');"
                                                                            class="btn btn-info btn-sm"><i
                                                                                class="feather icon-save"></i> Guardar
                                                                            cambios</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Cierre: (Editar)Datos Personales-->
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="p-comercial" role="tabpanel"
                                            aria-labelledby="p-comercial-tab">
                                            @if (isset($subdirector_cm) && $subdirector_cm != null)
                                                <!--NUEVO-->
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="card">
                                                        <div
                                                            class="card-header d-flex align-items-center justify-content-between bg-info">
                                                            <h5 class="mb-0 text-white">Perfil Administrador Comercial</h5>
                                                            <div class="float-md-right d-inline">
                                                                <button type="button" class="btn btn-light btn-icon m-0"
                                                                    data-toggle="collapse"
                                                                    data-target=".info_basica_subdirector_cm"
                                                                    aria-expanded="false"
                                                                    aria-controls="info_basica-1 info_basica-2">
                                                                    <i class="feather icon-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    onclick="eliminar_admin_cm(2,{{ $institucion->id }})"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </div>
                                                        </div>
                                                        <!--Datos Personales-->
                                                        <div class="card-body info_basica_subdirector_cm collapse show"
                                                            id="info_basica-1">
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--DATOS PERSONALES-->
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    DATOS PERSONALES</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Rut</label>
                                                                                <div class="" id="rut_subdirector_cm">
                                                                                    {{ $subdirector_cm->rut }} </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Nombre</label>
                                                                                <div class="" id="nombre_subdirector_cm">
                                                                                    {{ $subdirector_cm->nombre }} </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Primer
                                                                                    Apellido</label>
                                                                                <div id="apellido_uno_subdirector_cm"> {{ $subdirector_cm->apellido_uno }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Segundo
                                                                                    Apellido</label>
                                                                                <div id="apellido_dos_subdirector_cm"> {{ $subdirector_cm->apellido_dos }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Sexo</label>
                                                                                <div id="sexo_subdirector_cm">
                                                                                    @if ($subdirector_cm->sexo == 'F')
                                                                                        Mujer
                                                                                    @elseif ($subdirector_cm->sexo == 'M')
                                                                                        Hombre
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Nacimiento</label>
                                                                                <div id="nacimiento_subdirector_cm">
                                                                                    {{ \Carbon\Carbon::parse($subdirector_cm->fecha_nacimiento)->format('d-m-Y') }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--CONTACTO-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    CONTACTO</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Correo
                                                                                    Electrónico</label>
                                                                                <div id="email_subdirector_cm"> {{ $subdirector_cm->email }} </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Celular</label>
                                                                                <div id="telefono_uno_subdirector_cm">{{ $subdirector_cm->telefono_uno }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Teléfono</label>
                                                                                <div id="telefono_dos_subdirector_cm">{{ $subdirector_cm->telefono_dos }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--RESIDENCIA-->
                                                                        <div class="form-row mtop-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    RESIDENCIA</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Región</label>
                                                                                <div id="region_subdirector_cm">
                                                                                    {{ $subdirector_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Comuna</label>
                                                                                <div id="comuna_subdirector_cm">
                                                                                    {{ $subdirector_cm->Direccion()->first()->Ciudad()->first()->nombre }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Dirección</label>
                                                                                <div id="direccion_subdirector_cm">
                                                                                    {{ $subdirector_cm->Direccion()->first()->direccion . ' ' . $responsable->Direccion()->first()->numero_dir }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--CONTRASEÑA-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    CONTRASEÑA</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Contraseña
                                                                                    actual</label>
                                                                                <div> •••••••• </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Cierre: Datos Personales-->
                                                        <!--(Editar)Datos Personales-->

                                                        <div class="card-body info_basica_subdirector_cm collapse"
                                                            id="pinfo_basica_2">
                                                            <form>
                                                                <!--NUEVO EDITAR-->
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--EDITAR DATOS PERSONALES-->
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <p class="font-weight-bolder">DATOS
                                                                                    PERSONALES</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Rut</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_rut_subdirector_cm"
                                                                                    name="perfil_rut_subdirector_cm"
                                                                                    value="{{ $subdirector_cm->rut }}"
                                                                                    disabled>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Nombre</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_nombre_subdirector_cm"
                                                                                    name="perfil_nombre_subdirector_cm"
                                                                                    value="{{ $subdirector_cm->nombre }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Primer
                                                                                    Apellido</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_apellido_uno_subdirector_cm"
                                                                                    name="perfil_apellido_uno_subdirector_cm"
                                                                                    value="{{ $subdirector_cm->apellido_uno }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Segundo
                                                                                    Apellido</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_apellido_dos_subdirector_cm"
                                                                                    name="perfil_apellido_dos_subdirector_cm"
                                                                                    value="{{ $subdirector_cm->apellido_dos }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Sexo</label>
                                                                                <div
                                                                                    class="form-check form-check-inline mt-3">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        id="perfil_sexo_subdirector_cm"
                                                                                        name="perfil_sexo_subdirector_cm"
                                                                                        id="inlineRadio2" value="F"
                                                                                        @if ($subdirector_cm->sexo == 'F') checked @endif>
                                                                                    <label class="form-check-label"
                                                                                        for="inlineRadio2">Mujer</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        id="perfil_sexo_subdirector_cm"
                                                                                        name="perfil_sexo_subdirector_cm"
                                                                                        id="inlineRadio2" value="M"
                                                                                        @if ($subdirector_cm->sexo == 'M') checked @endif>
                                                                                    <label class="form-check-label"
                                                                                        for="inlineRadio1">Hombre</label>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Nacimiento</label>
                                                                                <input type="date"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_nac_subdirector_cm"
                                                                                    name="perfil_nac_subdirector_cm"
                                                                                    value="{{ $subdirector_cm->fecha_nac }}">
                                                                            </div>
                                                                        </div>
                                                                        <!--EDITAR CONTACTO-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <p class="font-weight-bolder">CONTACTO</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Correo
                                                                                    electrónico</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_email_subdirector_cm"
                                                                                    name="perfil_email_subdirector_cm"
                                                                                    value="{{ $subdirector_cm->email }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Celular</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_fono_subdirector_cm"
                                                                                    name="perfil_fono_subdirector_cm"
                                                                                    value="{{ $subdirector_cm->telefono_uno }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Teléfono</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_fono_dos_subdirector_cm"
                                                                                    name="perfil_fono_dos_subdirector_cm"
                                                                                    value="{{ $subdirector_cm->telefono_dos }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--EDITAR RESIDENCIA-->
                                                                        @if (isset($subdirector_cm))
                                                                            <div class="form-row mtop-4">
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                    <p class="font-weight-bolder">
                                                                                        RESIDENCIA</p>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Región</label>
                                                                                    <select
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="buscar_ciudad_responsable();"
                                                                                        id="perfil_region_subdirector_cm"
                                                                                        name="perfil_region_subdirector_cm">
                                                                                        <option value="">Seleccione
                                                                                            una Región</option>
                                                                                        @if (isset($regiones))
                                                                                            @foreach ($regiones as $region)
                                                                                                <option
                                                                                                    value="{{ $region->id }}"
                                                                                                    @if ($region->id == $subdirector_cm->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                                                    {{ $region->nombre }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Comuna</label>
                                                                                    <select
                                                                                        class="form-control form-control-sm"
                                                                                        id="perfil_ciudad_subdirector_cm"
                                                                                        name="perfil_ciudad_subdirector_cm">
                                                                                        <option value="">Seleccione
                                                                                            su comuna</option>
                                                                                        @if (isset($ciudades))
                                                                                            @foreach ($ciudades as $ciudad)
                                                                                                <option
                                                                                                    value="{{ $ciudad->id }}"
                                                                                                    @if ($subdirector_cm->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
                                                                                                    {{ $ciudad->nombre }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Dirección</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="perfil_direccion_subdirector_cm"
                                                                                        id="perfil_direccion_subdirector_cm"
                                                                                        value="{{ $subdirector_cm->Direccion()->first()->direccion }}">
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Nº</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="perfil_numero_direccion_subdirector_cm"
                                                                                        id="perfil_numero_direccion_subdirector_cm"
                                                                                        value="{{ $subdirector_cm->Direccion()->first()->numero_dir }}">
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <!--EDITAR CONTRASEÑA-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <p class="font-weight-bolder">CONTRASEÑA
                                                                                </p>
                                                                            </div>
                                                                            <form method="get"
                                                                                action="{{ route('adm_cm.cambio_contrasena_responsable') }}"
                                                                                id="form_cambio_contrasena_perfil_responsable"
                                                                                name="form_cambio_contrasena_perfil_responsable">
                                                                                <input type="hidden"
                                                                                    name="responsable_id"
                                                                                    id="responsable_id"
                                                                                    value="{{ $responsable->Usuario()->first()->id }}">
                                                                                @csrf
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Contraseña
                                                                                        actual</label>
                                                                                    <input type="password"
                                                                                        class="form-control form-control-sm"
                                                                                        name="responsable_actual"
                                                                                        id="responsable_actual">
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Nueva
                                                                                        contraseña</label>
                                                                                    <input type="password"
                                                                                        class="form-control form-control-sm"
                                                                                        name="responsable_nueva"
                                                                                        id="responsable_nueva">
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Repitir
                                                                                        contraseña</label>
                                                                                    <input type="password"
                                                                                        class="form-control form-control-sm"
                                                                                        name="responsable_validacion"
                                                                                        id="responsable_validacion">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-12 col-form-label"></label>
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm mr-2"><i
                                                                                class="feather icon-x"></i>
                                                                            Cancelar</button>
                                                                        <button type="button"
                                                                            onclick="editar_responsable_medico_datos_personales('director_comercial');"
                                                                            class="btn btn-info btn-sm"><i
                                                                                class="feather icon-save"></i> Guardar
                                                                            cambios</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Cierre: (Editar)Datos Personales-->
                                                    </div>
                                                </div>
                                                <!--CIERRE-->
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="p-farmacia" role="tabpanel"
                                            aria-labelledby="p-farmacia-tab">
                                            @if (isset($director_gestion_cuidado) && $director_gestion_cuidado != null)
                                                <!--NUEVO-->
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                                    <div class="card">
                                                        <div
                                                            class="card-header d-flex align-items-center justify-content-between bg-info">
                                                            <h5 class="mb-0 text-white">Perfil Administrador de Farmacia
                                                            </h5>
                                                            <div class="float-md-right d-inline">
                                                                <button type="button" class="btn btn-light btn-icon"
                                                                    data-toggle="collapse" data-target=".info_basica"
                                                                    aria-expanded="false"
                                                                    aria-controls="info_basica-1 info_basica-2">
                                                                    <i class="feather icon-edit"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-danger btn-sm"
                                                                    onclick="eliminar_admin_cm(3,{{ $institucion->id }})"><i
                                                                        class="fas fa-trash"></i></button>
                                                            </div>

                                                        </div>
                                                        <!--Datos Personales-->
                                                        <div class="card-body info_basica collapse show"
                                                            id="info_basica-1">
                                                            <form>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--DATOS PERSONALES-->
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    DATOS PERSONALES</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Rut</label>
                                                                                <div class="" id="rut_director_farmacia">
                                                                                    {{ $director_gestion_cuidado->rut }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Nombre</label>
                                                                                <div class="" id="nombre_director_farmacia">
                                                                                    {{ $director_gestion_cuidado->nombre }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Primer
                                                                                    Apellido</label>
                                                                                <div id="apellido_uno_director_farmacia">
                                                                                    {{ $director_gestion_cuidado->apellido_uno }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Segundo
                                                                                    Apellido</label>
                                                                                <div id="apellido_dos_director_farmacia">
                                                                                    {{ $director_gestion_cuidado->apellido_dos }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Sexo</label>
                                                                                <div id="sexo_director_farmacia">
                                                                                    @if ($director_gestion_cuidado->sexo == 'F')
                                                                                        Mujer
                                                                                    @elseif ($director_gestion_cuidado->sexo == 'M')
                                                                                        Hombre
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Nacimiento</label>
                                                                                <div id="nacimiento_director_farmacia">
                                                                                    {{ \Carbon\Carbon::parse($director_gestion_cuidado->fecha_nacimiento)->format('d-m-Y') }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--CONTACTO-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    CONTACTO</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Correo Electrónico</label>
                                                                                <div id="email_director_farmacia">
                                                                                    {{ $director_gestion_cuidado->email }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Celular</label>
                                                                                <div id="telefono_uno_director_farmacia">
                                                                                    {{ $director_gestion_cuidado->telefono_uno }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Teléfono</label>
                                                                                <div id="telefono_dos_director_farmacia">
                                                                                    {{ $director_gestion_cuidado->telefono_dos }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--RESIDENCIA-->
                                                                        <div class="form-row mtop-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    RESIDENCIA</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Región</label>
                                                                                <div id="region_director_farmacia">
                                                                                    {{ $director_gestion_cuidado->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Comuna</label>
                                                                                <div id="ciudad_director_farmacia">
                                                                                    {{ $director_gestion_cuidado->Direccion()->first()->Ciudad()->first()->nombre }}
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Dirección</label>
                                                                                <div id="direccion_director_farmacia">
                                                                                    {{ $director_gestion_cuidado->Direccion()->first()->direccion . ' ' . $director_gestion_cuidado->Direccion()->first()->numero_dir }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--CONTRASEÑA-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-1">
                                                                                <p class="text-c-blue font-weight-bolder">
                                                                                    CONTRASEÑA</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                <label
                                                                                    class="font-weight-bolder ml-0 mb-0">Contraseña
                                                                                    actual</label>
                                                                                <div> •••••••• </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Cierre: Datos Personales-->
                                                        <!--(Editar)Datos Personales-->
                                                        <div class="card-body info_basica collapse" id="pinfo_basica_2">
                                                            <form>
                                                                <!--NUEVO EDITAR-->
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--EDITAR DATOS PERSONALES-->
                                                                        <div class="form-row">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <p class="font-weight-bolder">DATOS
                                                                                    PERSONALES</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Rut</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_rut_director_farmacia"
                                                                                    name="perfil_rut_director_farmacia"
                                                                                    value="{{ $director_gestion_cuidado->rut }}"
                                                                                    disabled>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Nombre</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_nombre_director_farmacia"
                                                                                    name="perfil_nombre_director_farmacia"
                                                                                    value="{{ $director_gestion_cuidado->nombre }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Primer
                                                                                    Apellido</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_apellido_uno_director_farmacia"
                                                                                    name="perfil_apellido_uno_director_farmacia"
                                                                                    value="{{ $director_gestion_cuidado->apellido_uno }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Segundo Apellido</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_apellido_dos_director_farmacia"
                                                                                    name="perfil_apellido_dos_director_farmacia"
                                                                                    value="{{ $director_gestion_cuidado->apellido_dos }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Sexo</label>
                                                                                <div
                                                                                    class="form-check form-check-inline mt-3">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        id="perfil_sexo_director_farmacia_f"
                                                                                        name="perfil_sexo_director_farmacia"
                                                                                        id="inlineRadio2" value="F"
                                                                                        @if ($director_gestion_cuidado->sexo == 'F') checked @endif>
                                                                                    <label class="form-check-label"
                                                                                        for="inlineRadio2">Mujer</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input"
                                                                                        type="radio"
                                                                                        id="perfil_sexo_director_farmacia_m"
                                                                                        name="perfil_sexo_director_farmacia"
                                                                                        id="inlineRadio1" value="M"
                                                                                        @if ($director_gestion_cuidado->sexo == 'M') checked @endif>
                                                                                    <label class="form-check-label"
                                                                                        for="inlineRadio1">Hombre</label>
                                                                                </div>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Nacimiento</label>
                                                                                <input type="date"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_nac_director_farmacia"
                                                                                    name="perfil_nac_director_farmacia"
                                                                                    value="{{ $director_gestion_cuidado->fecha_nacimiento }}">
                                                                            </div>
                                                                        </div>
                                                                        <!--EDITAR CONTACTO-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <p class="font-weight-bolder">CONTACTO</p>
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Correo
                                                                                    electrónico</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_email_director_farmacia"
                                                                                    name="perfil_email_director_farmacia"
                                                                                    value="{{ $director_gestion_cuidado->email }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Celular</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_fono_director_farmacia"
                                                                                    name="perfil_fono_director_farmacia"
                                                                                    value="{{ $director_gestion_cuidado->telefono_uno }}">
                                                                            </div>
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                <label
                                                                                    class="floating-label-activo-sm">Teléfono</label>
                                                                                <input type="text"
                                                                                    class="form-control form-control-sm"
                                                                                    id="perfil_fono_dos_director_farmacia"
                                                                                    name="perfil_fono_dos_director_farmacia"
                                                                                    value="{{ $director_gestion_cuidado->telefono_dos }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                        <!--EDITAR RESIDENCIA-->
                                                                        @if (isset($director_gestion_cuidado))
                                                                            <div class="form-row mtop-4">
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                    <p class="font-weight-bolder">
                                                                                        RESIDENCIA</p>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Región</label>
                                                                                    <select
                                                                                        class="form-control form-control-sm"
                                                                                        onchange="buscar_ciudad_responsable();"
                                                                                        id="perfil_region_director_farmacia"
                                                                                        name="perfil_region_director_farmacia">
                                                                                        <option value="">Seleccione
                                                                                            una Región</option>
                                                                                        @if (isset($regiones))
                                                                                            @foreach ($regiones as $region)
                                                                                                <option
                                                                                                    value="{{ $region->id }}"
                                                                                                    @if ($region->id == $director_gestion_cuidado->Direccion()->first()->Ciudad()->first()->Region()->first()->id) selected @endif>
                                                                                                    {{ $region->nombre }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Comuna</label>
                                                                                    <select
                                                                                        class="form-control form-control-sm"
                                                                                        id="perfil_ciudad_director_farmacia"
                                                                                        name="perfil_ciudad_director_farmacia">
                                                                                        <option value="">Seleccione
                                                                                            su comuna</option>
                                                                                        @if (isset($ciudades))
                                                                                            @foreach ($ciudades as $ciudad)
                                                                                                <option
                                                                                                    value="{{ $ciudad->id }}"
                                                                                                    @if ($director_gestion_cuidado->Direccion()->first()->id_ciudad == $ciudad->id) selected @endif>
                                                                                                    {{ $ciudad->nombre }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </select>
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Dirección</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="perfil_dire_director_farmacia"
                                                                                        id="perfil_dire_director_farmacia"
                                                                                        value="{{ $director_gestion_cuidado->Direccion()->first()->direccion }}">
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Nº</label>
                                                                                    <input type="text"
                                                                                        class="form-control form-control-sm"
                                                                                        name="perfil_numero_dir_director_farmacia"
                                                                                        id="perfil_numero_dir_director_farmacia"
                                                                                        value="{{ $director_gestion_cuidado->Direccion()->first()->numero_dir }}">
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <!--EDITAR CONTRASEÑA-->
                                                                        <div class="form-row mt-4">
                                                                            <div
                                                                                class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                                                                                <p class="font-weight-bolder">CONTRASEÑA
                                                                                </p>
                                                                            </div>
                                                                            <form method="get"
                                                                                action="{{ route('adm_cm.cambio_contrasena_responsable') }}"
                                                                                id="form_cambio_contrasena_perfil_responsable"
                                                                                name="form_cambio_contrasena_perfil_responsable">
                                                                                <input type="hidden"
                                                                                    name="responsable_id"
                                                                                    id="responsable_id"
                                                                                    value="{{ $responsable->Usuario()->first()->id }}">
                                                                                @csrf
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Contraseña
                                                                                        actual</label>
                                                                                    <input type="password"
                                                                                        class="form-control form-control-sm"
                                                                                        name="responsable_actual"
                                                                                        id="responsable_actual">
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Nueva
                                                                                        contraseña</label>
                                                                                    <input type="password"
                                                                                        class="form-control form-control-sm"
                                                                                        name="responsable_nueva"
                                                                                        id="responsable_nueva">
                                                                                </div>
                                                                                <div
                                                                                    class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                                                    <label
                                                                                        class="floating-label-activo-sm">Repitir
                                                                                        contraseña</label>
                                                                                    <input type="password"
                                                                                        class="form-control form-control-sm"
                                                                                        name="responsable_validacion"
                                                                                        id="responsable_validacion">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-12 col-form-label"></label>
                                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm mr-2"><i
                                                                                class="feather icon-x"></i>
                                                                            Cancelar</button>
                                                                        <button type="button"
                                                                            onclick="editar_responsable_medico_datos_personales('director_farmacia');"
                                                                            class="btn btn-info btn-sm"><i
                                                                                class="feather icon-save"></i> Guardar
                                                                            cambios</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!--Cierre: (Editar)Datos Personales-->
                                                    </div>
                                                </div>
                                                <!--CIERRE-->
                                            @endif
                                        </div>
                                        <!--<div class="tab-pane fade" id="box" role="tabpanel" aria-labelledby="box-tab">
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE: PERFIL ADMINISTRADOR-->

                        <!--ADMINISTRADOR DE ROLES Y PERMISOS-->
                        <div class="tab-pane fade" id="rol-permiso" role="tabpanel"
                            aria-labelledby="rol-permiso-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--Contraseña-->
                                    <div class="card">
                                        <div class="card-header pt-3 pb-2 bg-light">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="f-18 d-inline mt-3 text-info">Asignar y Desasociar Personal
                                                        de La Institución</h6>
                                                    <div
                                                        class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                        <button type="button" class="btn btn-sm btn-info"
                                                            onclick="añadir_rol();"><i class="feather icon-plus"
                                                                aria-hidden="true"></i> Añadir Rol y Usuario</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6 col-md-12">



                                                    <table id="adm_roles"
                                                        class="display table table-striped table-xs dt-responsive nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-wrap text-left align-middle">Nombre</th>
                                                                <th class="text-wrap text-left align-middle">Rut</th>
                                                                <th class="text-wrap text-left align-middle">Rol</th>
                                                                <th class="text-wrap text-center align-middle">desasociar
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($personal)
                                                                @foreach ($personal as $per)
                                                                    <tr>
                                                                        <td class="text-wrap text-left align-middle">
                                                                            {{ $per->nombres . ' ' . $per->apellido_uno . ' ' . $per->apellido_dos }}
                                                                        </td>
                                                                        <td class="text-wrap text-left align-middle">
                                                                            {{ $per->rut }}</td>
                                                                        @if ($per->AsistenteTipo)
                                                                            <td class="align-middle text-left">
                                                                                <strong>{{ $per->AsistenteTipo->nombre }}</strong>
                                                                            </td>
                                                                            <td
                                                                                class="text-wrap text-center align-middle">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-sm btn-icon"
                                                                                    onclick="anadir_permisos('{{ $per->AsistenteTipo->nombre }}', {{ $per->AsistenteTipo->id }},{{ $per->id }});"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="Permisos"><i
                                                                                        class="feather icon-settings"></i></button>
                                                                            </td>
                                                                        @else
                                                                            <td class="align-middle text-left">
                                                                                <strong>{{ $per->TipoAdministrador->nombre }}</strong>
                                                                            </td>
                                                                            <td
                                                                                class="text-wrap text-center align-middle">
                                                                                <button type="button"
                                                                                    class="btn btn-danger btn-sm btn-icon"
                                                                                    onclick="anadir_permisos('{{ $per->TipoAdministrador->nombre }}', {{ $per->TipoAdministrador->id }},{{ $per->id }});"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="top"
                                                                                    title="Permisos"><i
                                                                                        class="feather icon-settings"></i></button>
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
                            <div class="row mt-0">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card mb-1">
                                        <div class="card-body">
                                            <h4 class="f-18 mb-0 text-info">Especialidades y áreas</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <ul class="nav nav-tabs-secciones-info" id="cm" role="tablist">
                                        <li class="nav-item-secciones-info">
                                            <a class="nav-secciones-info active  text-uppercase" id="box-tab"
                                                data-toggle="tab" href="#box" role="tab" aria-controls="box"
                                                aria-selected="false">Boxes de atención</a>
                                        </li>
                                        @if ($institucion->sala_espera)
                                            <li class="nav-item-secciones-info">
                                                <a class="nav-secciones-info text-uppercase" id="sala_espera-tab"
                                                    data-toggle="tab" href="#sala_espera" role="tab"
                                                    aria-controls="sala_espera" aria-selected="false">Salas de
                                                    Espera</a>
                                            </li>
                                        @endif
                                        <li class="nav-item-secciones-info">
                                            <a class="nav-secciones-info  text-uppercase" id="area-i-tab"
                                                data-toggle="tab" href="#area-i" role="tab"
                                                aria-controls="area-i" aria-selected="false">Áreas del Centro</a>
                                        </li>
                                        <li class="nav-item-secciones-info">
                                            <a class="nav-secciones-info  text-uppercase" id="esp-med-tab"
                                                data-toggle="tab" href="#esp-med" role="tab"
                                                aria-controls="esp-med" aria-selected="true">Especialidades médicas</a>
                                        </li>
                                        <li class="nav-item-secciones-info">
                                            <a class="nav-secciones-info text-uppercase" id="laboratorio-i-tab"
                                                data-toggle="tab" href="#laboratorio-i" role="tab"
                                                aria-controls="laboratorio-i" aria-selected="false">Laboratorios</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="tab-content" id="agregar_inf_cm">

                                        {{-- BOXES --}}
                                        <div class="tab-pane fade show active" id="box" role="tabpanel"
                                            aria-labelledby="box-tab">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <!--boxes-->
                                                    <div class="card">
                                                        <div class="card-header bg-info">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h6 class="f-18 d-inline mt-3 text-white ">Boxes de
                                                                        Atención</h6>
                                                                    <div
                                                                        class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-light"
                                                                            onclick="agregar_box();"><i
                                                                                class="feather icon-plus"
                                                                                aria-hidden="true"></i> Añadir</button>
                                                                        {{-- <button type="button" class="btn btn-sm btn-light" onclick="agregar_ambulancia()">Ambulancias</button> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12">
                                                                    <table id="tabla_boxes_atencion"
                                                                        class="display table table-striped table-xs dt-responsive nowrap"
                                                                        style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-wrap align-middle">N°
                                                                                    Asig.</th>
                                                                                <th class="text-wrap align-middle">Tipo
                                                                                </th>
                                                                                <th class="text-wrap align-middle">
                                                                                    Especialización</th>
                                                                                <th class="text-wrap align-middle">
                                                                                    Ubicación</th>
                                                                                <th class="text-wrap align-middle">Seccion
                                                                                </th>
                                                                                <th class="text-wrap align-middle">Activo
                                                                                </th>
                                                                                <th class="text-wrap align-middle">Editar
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if (isset($boxes_servicio) && $boxes_servicio->count() > 0)
                                                                                @foreach ($boxes_servicio as $box)
                                                                                    <tr>
                                                                                        <td class="align-middle">
                                                                                            {{ $box->numero_box }}</td>
                                                                                        <td class="align-middle">
                                                                                            {{ $box->tipo_box }}</td>
                                                                                        <td class="align-middle">
                                                                                            {{ $box->tipo_especializacion }}
                                                                                        </td>
                                                                                        <td class="align-middle">Piso
                                                                                            {{ $box->ubicacion }}</td>
                                                                                        <td class="align-middle">
                                                                                            {{ $box->seccion }}</td>
                                                                                        <td class="align-middle">
                                                                                            <div class="custom-control custom-switch">
                                                                                                <input type="checkbox"
                                                                                                    class="custom-control-input"
                                                                                                    id="esp-{{ $box->id }}"
                                                                                                    data-id="{{ $box->id }}"
                                                                                                    onchange="checkboxChanged(this)"
                                                                                                    {{ $box->estado == 1 ? 'checked' : '' }}>
                                                                                                <label class="custom-control-label" for="esp-{{ $box->id }}"></label>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-center">
                                                                                            <button type="button"
                                                                                                class="btn btn-warning btn-icon"
                                                                                                onclick="dame_box({{ $box->id }});"><i
                                                                                                    class="feather icon-edit"></i></button>
                                                                                            <button type="button"
                                                                                                class="btn btn-danger btn-icon"
                                                                                                onclick="eliminar_box({{ $box->id }})"><i
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
                                                {{-- <div class="col-md-6">
                                                <!--Especialidades-->
                                                <div class="card">
                                                    <div class="card-header pt-3 pb-2 bg-info">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6 class="f-18 d-inline mt-3 text-white text-center">Ambulancias  Equipos Servicios Apoyo</h6>
                                                                <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                                    <button type="button" class="btn btn-sm btn-info" onclick="agregar_serv_apoyo();"><i class="feather icon-plus" aria-hidden="true"></i> Añadir</button>
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
                                                                            <th class="text-wrap text-left align-middle">Tipo</th>

                                                                            <th class="text-wrap text-left align-middle">Observaciones</th>
                                                                            <th class="text-wrap text-left align-middle">Activo</th>
                                                                            <th class="text-wrap text-center align-middle">Editar</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="align-middle text-left">Ambulancias</td>
                                                                            <td class="align-middle text-text-left"><span>falta equipo</span></td>
                                                                            <td class="align-middle text-left">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="esp-1">
                                                                                    <label class="custom-control-label" for="esp-1"></label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                                                    <button type="button" class="btn sm btn-outline-primary" onclick="editar_serv_apoyo();"></i> Editar</button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="align-middle text-left">Sala de Procedimiento</td>
                                                                            <td class="align-middle text-text-left"><span>falta equipo</span></td>
                                                                            <td class="align-middle text-left">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="esp-1">
                                                                                    <label class="custom-control-label" for="esp-1"></label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                                                    <button type="button" class="btn sm btn-outline-primary" onclick="editar_serv_apoyo();"></i> Editar</button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="align-middle text-left">Laboratorio Clínico</td>
                                                                            <td class="align-middle text-text-left"><span>falta equipo</span></td>
                                                                            <td class="align-middle text-left">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="esp-1">
                                                                                    <label class="custom-control-label" for="esp-1"></label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                                                    <button type="button" class="btn sm btn-outline-primary" onclick="editar_serv_apoyo();"></i> Editar</button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="align-middle text-left">Laboratorio Radiológico</td>
                                                                            <td class="align-middle text-text-left"><span>falta equipo</span></td>
                                                                            <td class="align-middle text-left">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="esp-1">
                                                                                    <label class="custom-control-label" for="esp-1"></label>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <div class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                                                    <button type="button" class="btn sm btn-outline-primary" onclick="editar_serv_apoyo();"></i> Editar</button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                                {{--  <div class="col-md-6">
                                                <!--Área-->
                                                <div class="card">
                                                    <div class="card-header pt-3 pb-2 bg-light">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h6 class="f-18 d-inline mt-3 text-info">Servicios de Apoyo y Derivación</h6>
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
                                                                            <th class="text-wrap text-left align-middle">Activo</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="align-middle text-left">Laboratorio Clínico</td>
                                                                            <td class="align-middle text-left">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="area-1">
                                                                                    <label class="custom-control-label" for="area-1"></label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="align-middle text-left">Laboratorio Radiológico</td>
                                                                            <td class="align-middle text-left">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="area-2">
                                                                                    <label class="custom-control-label" for="area-2"></label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="align-middle text-left">Etc</td>
                                                                            <td class="align-middle text-left">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="area-3">
                                                                                    <label class="custom-control-label" for="area-3"></label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>  --}}
                                            </div>
                                        </div>

                                        @if ($institucion->sala_espera)
                                            {{-- SALA ESPERA --}}
                                            <div class="tab-pane fade" id="sala_espera" role="tabpanel"
                                                aria-labelledby="sala_espera-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        @include('general.seccion_adm_institucion.sala_espera_tabla')
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        {{-- ESPECIALIDADES --}}
                                        <div class="tab-pane fade" id="esp-med" role="tabpanel"
                                            aria-labelledby="esp-med-tab">
                                            <!--Especialidades-->
                                            <div class="card">
                                                <div class="card-header bg-info">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6 class="f-18 d-inline mt-3 text-white">Especialidades
                                                                Médicas</h6>
                                                            <div
                                                                class="btn-group mr-2 d-inline float-md-right float-md-right ml-4">
                                                                <button type="button" class="btn btn-sm btn-light"
                                                                    onclick="ag_especialidad();"><i
                                                                        class="feather icon-plus"
                                                                        aria-hidden="true"></i> Añadir</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body" id="contenedor_especialidades_cm">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div style="overflow-x:auto;">
                                                                <div class="table-responsive">
                                                                    <table id="especialidades_cm"
                                                                        class="display table table-striped table-xs dt-responsive nowrap"
                                                                        style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="text-wrap align-middle">Tipo
                                                                                    Especialidad</th>
                                                                                <th class="text-wrap align-middle">SubTipo
                                                                                    Especialidad</th>
                                                                                <th class="text-wrap align-middle">N°
                                                                                    Profesionales</th>
                                                                                <th class="text-wrap align-right">Acción
                                                                                </th>
                                                                                {{-- <th></th> --}}
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if (isset($especialidades_cm))
                                                                                @foreach ($especialidades_cm as $especialidad)
                                                                                    <tr>
                                                                                        <td class="align-middle">
                                                                                            {{ $especialidad->nombre }}
                                                                                        </td>
                                                                                        <td class="align-middle">
                                                                                            {{ $especialidad->sub_tipo }}
                                                                                        </td>
                                                                                        <td class="align-middle">
                                                                                            {{ $especialidad->num_profesionales }}
                                                                                        </td>
                                                                                        {{-- <td class="align-middle">
                                                                                <div class="custom-control custom-switch">
                                                                                    <input type="checkbox" class="custom-control-input" id="esp-{{ $especialidad->id }}" onchange="cambiarEstadoEspecialidad({{ $especialidad->id }})" @if ($especialidad->estado == 1) checked @endif>
                                                                                    <label class="custom-control-label" for="esp-{{ $especialidad->id }}"></label>
                                                                                </div>
                                                                            </td> --}}
                                                                                        <td class="align-middle">
                                                                                            <button type="button"
                                                                                                class="btn btn-warning btn-icon"
                                                                                                onclick="dame_especialidad_cm({{ $especialidad->id }})"><i
                                                                                                    class="feather icon-edit"></i></button>
                                                                                            <button type="button"
                                                                                                class="btn btn-danger btn-icon"
                                                                                                onclick="eliminar_especialidad_cm({{ $especialidad->id }});"><i
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
                                            </div>
                                        </div>

                                        {{-- AREAS --}}
                                        <div class="tab-pane fade" id="area-i" role="tabpanel"
                                            aria-labelledby="area-i-tab">
                                            <!--Área-->
                                            <div class="card">
                                                <div class="card-header bg-info">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6 class="f-18 d-inline mt-3 text-white">Áreas</h6>
                                                            <div class="btn-group mr-2 d-inline float-md-right  ml-4">
                                                                <button type="button" class="btn btn-sm btn-light"
                                                                    onclick="ag_area_cm();"><i class="feather icon-plus"
                                                                        aria-hidden="true"></i> Añadir</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body"id="contenedor_areas_cm">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div style="overflow-x:auto;">
                                                                <div class="table-responsive">
                                                                    <table id="area_cm"
                                                                        class="display table table-striped dt-responsive nowrap table-xs"
                                                                        style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Tipo</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Responsable</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Contacto</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    N° personal</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Integrantes</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Acción</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($areas_cm as $area)
                                                                                <tr>
                                                                                    <td class="align-middle text-left">
                                                                                        {{ $area->tipo_area }}</td>
                                                                                    <td class="align-middle text-left">
                                                                                        {{ $area->nombre . ' ' . $area->apellido_uno . ' ' . $area->apellido_dos }}
                                                                                    </td>
                                                                                    <td class="align-middle text-left">
                                                                                        {{ $area->email }}</td>
                                                                                    <td class="align-middle text-left">
                                                                                        {{ $area->numero_personas }}</td>
                                                                                    <td class="align-middle text-left">
                                                                                        @if ($area->profesionales)
                                                                                            @foreach ($area->profesionales as $profesional)
                                                                                                <span>{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}</span><br>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </td>
                                                                                    <td class="align-middle text-left">
                                                                                        <button type="button"
                                                                                            class="btn btn-info btn-icon"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title="Asociar profesionales del área de {{ $area->tipo_area }}"
                                                                                            onclick="asignar_profesionales_area({{ $area->id }})"><i
                                                                                                class="fa-solid fa-inbox"></i></button>
                                                                                        <button type="button"
                                                                                            class="btn btn-warning btn-icon"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title="Editar responsable {{ $area->tipo_area }}"
                                                                                            onclick="dame_area_cm({{ $area->id }},{{ $institucion->id_lugar_atencion }})"><i
                                                                                                class="fa-solid fa-pencil-alt"></i></button>
                                                                                        <button type="button"
                                                                                            class="btn btn-danger btn-icon"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title="Eliminar area {{ $area->tipo_area }}"
                                                                                            onclick="eliminar_area_cm({{ $area->id }});"><i
                                                                                                class="fa-solid fa-trash"></i></button>
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

                                        <!-- ASIGNACION DE PROFESIONALES POR AREA -->
                                        <div class="tab-pane fade" id="asignacion-prof" role="tabpanel"
                                            aria-labelledby="asignacion-prof-tab">
                                            <!--Área-->
                                            <div class="card">
                                                <div class="card-header bg-info">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6 class="f-18 d-inline mt-3 text-white">Asignacion de
                                                                Profesionales</h6>
                                                            <div class="btn-group mr-2 d-inline float-md-right  ml-4">
                                                                <button type="button" class="btn btn-sm btn-light"
                                                                    onclick="ag_area_cm();"><i class="feather icon-plus"
                                                                        aria-hidden="true"></i> Añadir</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body" id="contenedor_areas_cm_profesionales">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div style="overflow-x:auto;">
                                                                <div class="table-responsive">
                                                                    <table id="area_cm"
                                                                        class="display table table-striped dt-responsive nowrap table-xs"
                                                                        style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Área</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Tipo</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Responsable</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Contacto</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    N° personal</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Integrantes</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Acción</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($areas_cm as $area)
                                                                                <tr>
                                                                                    <td class="align-middle text-left">
                                                                                        {{ $area->nombre }}</td>
                                                                                    <td class="align-middle text-left">
                                                                                        {{ $area->tipo_area }}</td>
                                                                                    <td class="align-middle text-left">
                                                                                        {{ $area->nombre . ' ' . $area->apellido_uno . ' ' . $area->apellido_dos }}
                                                                                    </td>
                                                                                    <td class="align-middle text-left">
                                                                                        {{ $area->email }}</td>
                                                                                    <td class="align-middle text-left">
                                                                                        {{ $area->numero_personas }}</td>
                                                                                    <td class="align-middle text-left">
                                                                                        @if ($area->profesionales)
                                                                                            @foreach ($area->profesionales as $profesional)
                                                                                                <span>{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}</span><br>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </td>
                                                                                    <td class="align-middle text-left">
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-secondary btn-icon"
                                                                                            data-toggle="tooltip"
                                                                                            data-placement="top"
                                                                                            title="Editar responsable {{ $area->tipo_area }}"
                                                                                            onclick="asignar_profesionales_area({{ $area->id }})"><i
                                                                                                class="feather icon-edit"></i></button>

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

                                        <!-- LABORATORIOS -->
                                        <div class="tab-pane fade" id="laboratorio-i" role="tabpanel"
                                            aria-labelledby="laboratorio-i">
                                            <!--Laboratorios-->
                                            <div class="card">
                                                <div class="card-header bg-info">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6 class="f-18 d-inline mt-3 text-white">Laboratorio</h6>
                                                            <div class="btn-group mr-2 d-inline float-md-right ml-4">
                                                                <button type="button" class="btn btn-sm btn-light"
                                                                    onclick="ag_laboratorio();"><i
                                                                        class="feather icon-plus"
                                                                        aria-hidden="true"></i> Añadir</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-12">
                                                            <div style="overflow-x:auto;">
                                                                <div class="table-responsive" id="tabla_laboratorios">
                                                                    <table id="servicios_cm"
                                                                        class="display table table-striped dt-responsive nowrap table-xs"
                                                                        style="width:100%">
                                                                        <thead>
                                                                            <tr>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Rut</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Laboratorio</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Ubicación</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Tipo Laboratorio</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Ciudad</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Dirección</th>
                                                                                <th
                                                                                    class="text-wrap text-left align-middle">
                                                                                    Acción</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @if (isset($laboratorios))
                                                                                @foreach ($laboratorios as $laboratorio)
                                                                                    <tr>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->rut }}</td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->nombre }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->ubicacion == 1 ? 'Laboratorio Físico' : 'Solo toma de muestra' }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->tipo_sucursal_nombre }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->ciudad }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            {{ $laboratorio->direccion }}
                                                                                            {{ $laboratorio->numero_dir }}
                                                                                        </td>
                                                                                        <td
                                                                                            class="align-middle text-left">
                                                                                            <button type="button"
                                                                                                class="btn btn-warning btn-icon"
                                                                                                onclick="dame_laboratorio_cm({{ $laboratorio->id }})"><i
                                                                                                    class="feather icon-edit"></i></button>
                                                                                            <button type="button"
                                                                                                class="btn btn-danger btn-icon"
                                                                                                onclick="eliminar_laboratorio_cm({{ $laboratorio->id }});"><i
                                                                                                    class="feather icon-x"></i></button>
                                                                                            <button type="button" class="btn btn-primary btn-icon" onclick="horario_laboratorio_cm({{ $laboratorio->id }});"><i class="feather icon-clock"></i></button>
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

<!--Cierre: Container Completo-->
@endsection


@section('modales')
    <input type="hidden" id="id_especialidad_cm" name="id_especialidad_cm" value="">
    <input type="hidden" id="id_institucion" name="id_institucion" value="">
    <input type="hidden" id="id_lugar_atencion" name="id_lugar_atencion" value="">
    @include('app.adm_cm.modales.anadir_area')
    @include('app.adm_cm.modales.anadir_box')
    @include('app.adm_cm.modales.agregar_bodega')
    @include('app.adm_cm.modales.agregar_bodega_editar')
    <div id="permisos_rol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="permisos_rol"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Desasociar Funcionario</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-modal active" id="uno_tab" data-toggle="pill"
                                        href="#uno" role="tab" aria-controls="uno" aria-selected="true">Datos
                                        del Funcionario</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-modal" id="dos_tab" data-toggle="pill" href="#dos"
                                        role="tab" aria-controls="pills-home" aria-selected="true">Desasociar y
                                        cambiar clave</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-content" id="pills-tablas-remuneraciones">
                                <!--INFORMACION DE ACCESO-->
                                <div class="tab-pane fade show active" id="uno" role="tabpanel"
                                    aria-labelledby="uno_tab">
                                    <div class="row haberes collapse show" id="info_funcionario-1">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <h5 class="text-info">DATOS DEL FUNCIONARIO</h5>
                                            <hr class="mt-1">
                                        </div>

                                        <div class="col-sm-12 col-md-12 mb-3">
                                            <div class="table-responsive">
                                                <table id="info_funcionario"
                                                    class="display table-bordered table table-striped dt-responsive nowrap table-xs"
                                                    style="width:100%">
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
                                                            <input type="hidden" name="personal_desha_clave_id"
                                                                id="personal_desha_clave_id" value="">
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
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="personal_desha_clave_edit"
                                                                    placeholder="Clave de Acceso">
                                                                <input type="hidden" name="personal_desha_clave_id"
                                                                    id="personal_desha_clave_id_edit" value="">
                                                                <input type="hidden" name="personal_desha_clave_id"
                                                                    id="personal_id_persona" value="">
                                                                <input type="hidden" name="personal_desha_clave_id"
                                                                    id="personal_id_personal" value="">
                                                                <input type="hidden" name="personal_desha_clave_id"
                                                                    id="personal_id_lugar_atencion" value="">
                                                                <input type="hidden" name="personal_desha_clave_id"
                                                                    id="personal_tipo_personal_edit" value="">
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th class="align-middle">MOTIVO TÉRMINO RELACIÓN</th>
                                                            <th class="align-middle"><input type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="personal_desha_motivo_temrino"
                                                                    placeholder="Motivo Término Relación"></th>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th class="align-middle bg-tfoot-info-claro">LA VOLVERIA A
                                                                CONTRATAR ?</th>
                                                            <th class="align-middle"><input type="text"
                                                                    class="form-control form-control-sm"
                                                                    id="personal_desha_volver_contratar"
                                                                    placeholder="La volvería a contratar"></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-info btn-sm mx-auto"
                                                onclick="cambiarContrasenalugarAtencion()">Guardar cambios</button>
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
    <div id="a_rol" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_rol"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Agregar Empleado Nuevo</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="add_empleado_id_institucion" id="add_empleado_id_institucion"
                        value="{{ $institucion->id }}">
                    <input type="hidden" name="add_empleado_id_lugar_atencion" id="add_empleado_id_lugar_atencion"
                        value="{{ $institucion->id_lugar_atencion }}">
                    <input type="hidden" name="add_empleado_id_admin_creador" id="add_empleado_id_admin_creador"
                        value="{{ Auth::user()->id }}">
                    <input type="hidden" name="add_empleado_id_tipo_admin_creador"
                        id="add_empleado_id_tipo_admin_creador" value="{{ Auth::user()->Roles()->first()->id }}">
                    <input type="hidden" name="" id="">
                    <table id="rend-caja-dental"
                        class="display table-bordered table table-striped dt-responsive nowrap table-xs"
                        style="width:100%">
                        <tbody>
                            <tr>
                                <th class="align-middle" colspan="2">Tipo Contrato</th>
                                <th class="align-middle" colspan="2">
                                    <select class="form-control form-control-sm" name="add_empleado_tipo_contrato"
                                        id="add_empleado_tipo_contrato">
                                        <option value="">Seleccione</option>
                                        @if ($lista_tipo_contrato)
                                            @foreach ($lista_tipo_contrato as $item)
                                                <option value="{{ $item['nombre'] }}" data-id="{{ $item['id'] }}">
                                                    {{ $item['nombre'] }}</option>
                                            @endforeach
                                        @endif
                                        {{--  asistente tipo  --}}
                                        {{--  tipo institucion  --}}
                                        {{--  tipo administrador  --}}
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h5>Información Personal</h5>
                                </th>
                            </tr>
                            <tr>
                                <th class="align-middle">Rut</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm" name="add_empleado_rut"
                                        id="add_empleado_rut">
                                </th>
                                <th class="align-middle">Nombres</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm"
                                        name="add_empleado_nombre" id="add_empleado_nombre">
                                </th>
                            </tr>

                            <tr>
                                <th class="align-middle">Apellido Paterno</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm"
                                        name="add_empleado_apellido_uno" id="add_empleado_apellido_uno">
                                </th>
                                <th class="align-middle">Apellido Materno</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm"
                                        name="add_empleado_apellido_dos" id="add_empleado_apellido_dos">
                                </th>
                            </tr>
                            <tr>
                                <th class="align-middle">Email</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm"
                                        name="add_empleado_email" id="add_empleado_email">
                                </th>
                                <th class="align-middle">Telefono</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm"
                                        name="add_empleado_telefono" id="add_empleado_telefono">
                                </th>
                            </tr>

                            <tr>
                                <th colspan="4">
                                    <h5>Dirección</h5>
                                </th>
                            </tr>
                            <tr>
                                <th class="align-middle">Región</th>
                                <th class="align-middle">
                                    <select class="form-control form-control-sm" name="add_empleado_region"
                                        id="add_empleado_region" onchange="buscar_ciudad_nuevo_empleado();">
                                        <option value="">Seleccione</option>
                                        @if ($regiones)
                                            @foreach ($regiones as $reg)
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </th>
                                <th class="align-middle">Ciudad</th>
                                <th class="align-middle">
                                    <select class="form-control form-control-sm" name="add_empleado_ciudad"
                                        id="add_empleado_ciudad">
                                        <option value="">Seleccione</option>
                                    </select>
                                </th>
                            </tr>

                            <tr>
                                <th class="align-middle">Dirección</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm"
                                        name="add_empleado_direccion" id="add_empleado_direccion">
                                </th>
                                <th class="align-middle">Número</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm"
                                        name="add_empleado_numero" id="add_empleado_numero">
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h5>Horario</h5>
                                </th>
                            </tr>
                            <tr>
                                <th class="align-middle">Dias Laborales</th>
                                <th class="align-middle" colspan="3">
                                    <select class="js-example-basic-multiple" name="add_empleado_dias_laborales"
                                        id="add_empleado_dias_laborales" multiple="multiple">
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
                                    <input type="time" class="form-control form-control-sm"
                                        id="add_empleado_hora_entrada" name="add_empleado_hora_entrada"
                                        value="08:00">
                                </th>
                                <th class="align-middle">Hora salida</th>
                                <th class="align-middle">
                                    <input type="time" class="form-control form-control-sm"
                                        id="add_empleado_hora_salida" name="add_empleado_hora_salida" value="19:00">
                                </th>

                            </tr>
                            <tr>
                                <th class="align-middle">Hora inicio colación</th>
                                <th class="align-middle">
                                    <input type="time" class="form-control form-control-sm"
                                        id="add_empleado_hora_entrada_colacion"
                                        name="add_empleado_hora_entrada_colacion" value="12:00">
                                </th>
                                <th class="align-middle">Hora término colación</th>
                                <th class="align-middle">
                                    <input type="time" class="form-control form-control-sm"
                                        id="add_empleado_hora_salida_colacion" name="add_empleado_hora_salida_colacion"
                                        value="13:00">
                                </th>
                            </tr>
                            <tr>
                                <th colspan="4">
                                    <h5>Identificador a Institución</h5>
                                </th>
                            </tr>
                            <tr>
                                <th class="align-middle">Clave de Ingreso</th>
                                <th class="align-middle">
                                    <input type="text" class="form-control form-control-sm"
                                        id="add_empleado_clave_ingreso" name="add_empleado_clave_ingreso"
                                        placeholder="Clave ingreso Institución" value="">
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto"
                        onclick="registrar_nuevo_empleado();">Añadir al Equipo</button>
                </div>
            </div>
        </div>
    </div>

    {{--  MODAL AREA  --}}
    <div id="a_area" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_area"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir o editar Administradores del centro</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
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
                                        @foreach ($cargos as $cargo)
                                            <option value="{{ $cargo->id }}">{{ $cargo->nombres }}</option>
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
                                        @if (isset($profesionales))
                                            @foreach ($profesionales as $profesional)
                                                <option value="{{ $profesional->id_profesional }}">
                                                    {{ $profesional->nombre }} {{ $profesional->apellido_uno }}
                                                    {{ $profesional->apellido_dos }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto"
                        onclick="editar_direccion_medica({{ $institucion->id }})">Guardar Cambios
                        Administración</button>
                </div>
            </div>
        </div>
    </div>

    {{--  MODAL AREA  --}}
    <div id="a_servicio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_servicio"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir servicio</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12 py-2 w-100">
                                <button type="button" class="btn btn-outline-success btn-sm"
                                    onclick="mostrar_div_servicio()"><i class="fas fa-plus"></i> Crear nuevo
                                    servicio</button>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar áreas-->
                                    <label class="floating-label">Servicio</label>
                                    <div class="d-flex justify-content-between">
                                        <select class="form-control form-control-sm" id="servicio">
                                            <option value="0">Seleccione</option>
                                            @if (isset($servicios))
                                                @foreach ($servicios as $servicio)
                                                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>

                                    </div>

                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar áreas-->
                                    <label class="floating-label">Responsable</label>
                                    <select class="form-control form-control-sm" id="responsable_servicio">
                                        <option value="0">Seleccione</option>
                                        @if (isset($profesionales))
                                            @foreach ($profesionales as $profesional)
                                                <option value="{{ $profesional->id_profesional }}">
                                                    {{ $profesional->nombre }} {{ $profesional->apellido_uno }}
                                                    {{ $profesional->apellido_dos }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div id="div_form_servicio" class="d-none w-100">
                                <div class="col-sm-12">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm" for="nombre_servicio_">Nombre del
                                            servicio</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_servicio_" id="nombre_servicio_">
                                    </div>
                                </div>

                                <div class="col-sm-12 d-none">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm" for="rut_servicio">RUT</label>
                                        <input type="text" class="form-control form-control-sm" name="rut_servicio"
                                            id="rut_servicio">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Institución</label>
                                        <input type="address" class="form-control form-control-sm"
                                            name="institucion_servicio" id="institucion_servicio"
                                            value="{{ $institucion->nombre }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm" for="telefono_servicio">Telefono</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="telefono_servicio" id="telefono_servicio">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm" for="anexo_servicio">Anexo</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="anexo_servicio" id="anexo_servicio">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm" for="email_servicio">Email</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="email_servicio" id="email_servicio">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-outline-success btn-sm my-3 float-right"
                                        onclick="guardar_nuevo_servicio()"><i class="fas fa-save"></i> Guardar</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto"
                        onclick="guardar_servicio()">Añadir</button>
                </div>
            </div>
        </div>
    </div>

    {{--  MODAL ESPECIALIDADES  --}}
    <div id="a_especialidad" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_especialidad"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir especialidad</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar especialidades-->
                                    <label class="floating-label-activo-sm">Tipo Especialidad</label>
                                    <select class="form-control form-control-sm" id="especialidad_cm"
                                        name="especialidad_cm" onchange="buscar_sub_tipo_especialidad(this);">
                                        <option>Seleccione</option>
                                        @if (isset($especialidades))
                                            @foreach ($especialidades as $especialidad)
                                                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sub Tipo Especialidad</label>
                                    <select class="form-control form-control-sm" name="sub_tipo_especialidad_cm"
                                        id="sub_tipo_especialidad_cm">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N° Profesionales</label>
                                    <input type="number" name="num_profesionales" id="num_profesionales"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="guardar_especialidad_cm()"><i
                            class="fas fa-plus"></i> Añadir</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- MODAL EDITAR ESPECIALIDAD --}}
    <div id="editar_especialidad" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="editar_especialidad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Editar especialidad</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <!--Cargar especialidades-->
                                    <label class="floating-label-activo-sm">Tipo Especialidad</label>
                                    <select class="form-control form-control-sm" id="editar_especialidad_nombre"
                                        name="editar_especialidad_nombre"
                                        onchange="editar_buscar_sub_tipo_especialidad(this);">
                                        <option>Seleccione</option>
                                        @if (isset($especialidades))
                                            @foreach ($especialidades as $especialidad)
                                                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sub Tipo Especialidad</label>
                                    <select class="form-control form-control-sm" name="editar_especialidad_sub_tipo"
                                        id="editar_especialidad_sub_tipo">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N° Profesionales</label>
                                    <input type="number" name="editar_especialidad_num_profesionales"
                                        id="editar_especialidad_num_profesionales" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="editar_especialidad_cm()"><i
                            class="feather icon-save"></i> Guardar cambios</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modal_editar_horario_atencion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_horario_atencion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center" id="nuevo_horario_atencion_titulo">Configurar horario de atenci&oacute;n</h5>
                <button type="button" id="cerrar_modal_editar_horario_atencion" class="close text-white" onclick="" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="">
                    <input type="hidden" name="mi_horario_id_lab" id="mi_horario_id_lab">
                    <div class="form-row">
                        <div class="col-sm-12">
                            <h6 class="t-aten">Tipo de agenda</h6>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Seleccione </label>
                                <select name="tipo_agenda_medica" id="tipo_agenda_medica" class="form-control form-control-sm" onclick="validar_tipo_agenda();">

                                    @if($profesional->id_especialidad == 2)
                                        <option value="2">Atención Dental</option>
                                    @else
                                        <option value="0">Seleccione</option>
                                        <option value="1">Atención General</option>
                                        <option value="3">Atención Telemedicina</option>
                                        <option value="4">Exámenes</option>
                                        <option value="5">Procedimiento</option>
                                    @endif

                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-sm-12">
                            <h6 class="text-c-blue mb-3">Duraci&oacute;n</h6>
                        </div> --}}

                        <div class="col-sm-12 mb-1">
                            <h6 class="t-aten">Horario de Atenci&oacute;n</h6>
                        </div>
                        {{-- <div class="col-sm-6 mb-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo Agenda </label>
                                <select name="tipo_agenda_medica" id="tipo_agenda_medica" class=" form-control" onclick="validar_tipo_agenda();">
                                    <option value="0">Seleccione tipo de agenda</option>
                                    <option value="1">Atención General</option>
                                    <option value="2">Atención Dental</option>
                                    <option value="3">Atención Telemedicina</option>
                                    <option value="4">Exámenes</option>
                                    <option value="5">Procedimiento</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Duraci&oacute;n de Consultas M&eacute;dicas </label>
                                <select name="duracion_horario" id="duracion_horario" class=" form-control form-control-sm">
                                    <option value="0">Seleccione</option>
                                    <option value="00:15:00">15 minutos</option>
                                    <option value="00:30:00">30 minutos</option>
                                    <option value="00:45:00">45 minutos</option>
                                    <option value="01:00:00">60 minutos</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Día de atención</label>
                                <select name="dia_horario" id="dia_horario" class=" form-control form-control-sm">
                                    <option value="0" selected>Seleccione</option>
                                    <option value="1">Lunes</option>
                                    <option value="2">Martes</option>
                                    <option value="3">Mi&eacute;rcoles</option>
                                    <option value="4">Jueves</option>
                                    <option value="5">Viernes</option>
                                    <option value="6">S&aacute;bado</option>
                                    <option value="7">Domingo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Desde </label>
                                <select name="hora_inicio_horario" id="hora_inicio_horario" class=" form-control form-control-sm">
                                    <option value="0">Seleccione horario</option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Hasta </label>
                                <select name="hora_termino_horario" id="hora_termino_horario" class=" form-control form-control-sm">
                                    <option value="0">Seleccione horario</option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 mb-2">
                            <button type="button" onclick="mi_horario_agregar();" class="btn btn-info btn-sm float-md-right" data-dismiss="modal"><i class="fa fa-plus"></i> Agregar horario de atención</button>
                            {{-- <button type="button" id="cerrar_modal_horario2" class="btn btn-danger btn-sm">Cancelar</button> --}}
                        </div>
                        <div class="col-sm-12 mt-2 mb-2">
                            <table id="mi_horario_table" class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="align-middle">Agenda</th>
                                        <th class="align-middle">Desde</th>
                                        <th class="align-middle">Hasta</th>
                                        <th class="align-middle">D&iacute;a</th>
                                        <th class="text-center align-middle">Acci&oacute;n</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-danger" id="cerrar_modal_horario">Cancelar</button>
                <button type="button" class="btn btn-info" id="cerrar_modal_horario1">Cerrar</button>
            </div>-->
        </div>
    </div>
</div>

    <div id="editar_area" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_area"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Editar área</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <!--Cargar áreas-->
                                    <label class="floating-label-activo-sm">Área</label>
                                    <select class="form-control form-control-sm" id="editar_tipo_area">
                                        <option value="0">Seleccione</option>
                                        @foreach ($tipos_areas_cm as $tipo_area_cm)
                                            <option value="{{ $tipo_area_cm->id }}">{{ $tipo_area_cm->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Responsable</label>
                                    <select class="form-control form-control-sm" id="editar_responsable_cargo_area">
                                        <option value="0">Seleccione</option>
                                        @foreach ($profesionales as $profesional)
                                            <option value="{{ $profesional->id_profesional }}">
                                                {{ $profesional->nombre }} {{ $profesional->apellido_uno }}
                                                {{ $profesional->apellido_dos }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Contacto (email)</label>
                                    <input type="text" class="form-control form-control-sm" name="editar_e_cont"
                                        id="editar_e_cont">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label-activo">Teléfono</label>
                                    <input type="number" class="form-control form-control-sm" name="editar_tel_c"
                                        id="editar_tel_c">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label-activo">N°/ Pers. a cargo</label>
                                    <input type="number" class="form-control form-control-sm" name="editar_n_pers"
                                        id="editar_n_pers">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto"
                        onclick="editar_area_cm({{ $institucion->id_lugar_atencion }})"><i
                            class="feather icon-save"></i> Guardar cambios</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{--  MODAL ESPECIALIDADES  --}}
    <div id="a_otra_especialidad" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="a_otra_especialidad" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Añadir otra especialidad</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar especialidades-->
                                    <label class="floating-label">Especialidad</label>
                                    <select class="form-control form-control-sm" id="especialidad_cm_otra"
                                        name="especialidad_cm_otra">
                                        <option>Seleccione</option>
                                        @if (isset($especialidades))
                                            @foreach ($especialidades as $especialidad)
                                                <option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto"
                        onclick="guardar_otra_especialidad_cm()">Añadir</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL ASOCIAR PROFESIONALES AREA --}}
    <div id="asociar_profesionales_area" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="asociar_profesionales_area" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Asociar profesionales a área</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col-sm-12">
                                <div class="form-group fill">
                                    <!--Cargar áreas-->
                                    <label class="floating-label-activo-sm">Profesionales</label>
                                    <select class="form-control form-control-sm js-example-basic-multiple"
                                        id="profesionales_area" name="profesionales_area" multiple>
                                        <option>Seleccione</option>
                                        @if (isset($profesionales))
                                            @foreach ($profesionales as $profesional)
                                                <option value="{{ $profesional->id_profesional }}">
                                                    {{ $profesional->nombre }} {{ $profesional->apellido_uno }}
                                                    {{ $profesional->apellido_dos }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto"
                        onclick="guardar_profesionales_area()"><i class="fas fa-plus"></i> Añadir</button>
                </div>

            </div>
        </div>
    </div>

    {{-- MODAL LABORATORIOS --}}
    <div id="a_laboratorio" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="a_laboratorio"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Laboratorios</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <input type="text" name="nombre_laboratorio" id="nombre_laboratorio"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="text" name="rut_laboratorio" id="rut_laboratorio"
                                        oninput="formatoRut(this)" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <!-- radio button -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check form-check-input" type="radio" name="tipo_lab"
                                            id="tipo_lab" value="1">
                                        <label class="form-check form-check-label" for="tipo_lab">Laboratorio
                                            Físico</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check form-check-input" type="radio" name="tipo_lab"
                                            id="tipo_lab" value="2">
                                        <label class="form-check form-check-label" for="tipo_lab">Solo toma de
                                            muestra</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo Laboratorio</label>
                                    <select name="tipo_laboratorio" id="tipo_laboratorio"
                                        class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        @if (isset($tipos_laboratorio))
                                            @foreach ($tipos_laboratorio as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Email</label>
                                    <input type="email" name="email_laboratorio" id="email_laboratorio"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Teléfono</label>
                                    <input type="text" name="telefono_laboratorio" id="telefono_laboratorio"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Región</label>
                                    <select name="region_laboratorio" id="region_laboratorio"
                                        class="form-control form-control-sm" onchange="buscar_ciudad_laboratorio();">
                                        <option value="0">Seleccione</option>
                                        @if ($regiones)
                                            @foreach ($regiones as $reg)
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select name="ciudad_laboratorio" id="ciudad_laboratorio"
                                        class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Dirección</label>
                                    <input type="text" name="direccion_laboratorio" id="direccion_laboratorio"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N°</label>
                                    <input type="text" name="numero_laboratorio" id="numero_laboratorio"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="agregar_laboratorio()"><i
                            class="fas fa-plus"></i> Añadir</button>
                </div>

            </div>
        </div>
    </div>

    {{-- MODAL EDITAR LABORATORIO --}}
    <div id="editar_laboratorio" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="editar_laboratorio" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Editar laboratorio</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Nombre</label>
                                    <input type="text" name="editar_nombre_laboratorio"
                                        id="editar_nombre_laboratorio" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Rut</label>
                                    <input type="text" name="editar_rut_laboratorio" id="editar_rut_laboratorio"
                                        oninput="formatoRut(this)" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <!-- radio button -->
                                    <div class="form-check form-check-inline">
                                        <input class="form-check form-check-input" type="radio"
                                            name="editar_tipo_lab" id="editar_tipo_lab" value="1">
                                        <label class="form-check form-check-label" for="editar_tipo_lab">Laboratorio
                                            Físico</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check form-check-input" type="radio"
                                            name="editar_tipo_lab" id="editar_tipo_lab" value="2">
                                        <label class="form-check form-check-label" for="editar_tipo_lab">Solo toma de
                                            muestra</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo Laboratorio</label>
                                    <select name="editar_tipo_laboratorio" id="editar_tipo_laboratorio"
                                        class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                        @if (isset($tipos_laboratorio))
                                            @foreach ($tipos_laboratorio as $tipo)
                                                <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Correo electrónico</label>
                                    <input type="email" name="editar_email_laboratorio"
                                        id="editar_email_laboratorio" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Teléfono</label>
                                    <input type="text" name="editar_telefono_laboratorio"
                                        id="editar_telefono_laboratorio" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Región</label>
                                    <select name="editar_region_laboratorio" id="editar_region_laboratorio"
                                        class="form-control form-control-sm"
                                        onchange="buscar_ciudad_laboratorio_editar();">
                                        <option value="0">Seleccione</option>
                                        @if ($regiones)
                                            @foreach ($regiones as $reg)
                                                <option value="{{ $reg->id }}">{{ $reg->nombre }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ciudad</label>
                                    <select name="editar_ciudad_laboratorio" id="editar_ciudad_laboratorio"
                                        class="form-control form-control-sm">
                                        <option value="0">Seleccione</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Dirección</label>
                                    <input type="text" name="editar_direccion_laboratorio"
                                        id="editar_direccion_laboratorio" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">N°</label>
                                    <input type="text" name="editar_numero_laboratorio"
                                        id="editar_numero_laboratorio" class="form-control form-control-sm">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="editar_laboratorio()"><i
                            class="feather icon-save"></i> Guardar cambios</button>
                </div>

            </div>
        </div>
    </div>

    {{-- MODAL EDITAR BOX --}}
    <div id="editar_box" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editar_box"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white text-center">Editar box</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Asignar N° al box</label>
                                    <input type="text" name="editar_numero_box" id="editar_numero_box"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo Box</label>
                                    <select class="form-control form-control-sm" name="editar_tpo_box_servicio"
                                        id="editar_tpo_box_servicio" onchange="editar_dame_especializacion_box()">
                                        <option value="0">Seleccione</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Especializado">Especializado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12"
                                id="editar_contenedor_tpo_especializacion">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Tipo de especialización</label>
                                    <select class="form-control form-control-sm" name="editar_tpo_especializacion"
                                        id="editar_tpo_especializacion">
                                        <option value="0">Seleccione</option>
                                        <option value="Oftalmologia">Oftalmología</option>
                                        <option value="Otorrino">Otorrino</option>
                                        <option value="Odontologia general">Odontologia general</option>
                                        <option value="Sala de procedimientos">Sala de procedimientos</option>
                                        <option value="Vacunatorio">Vacunatorio</option>
                                        <option value="Kinesiologia y rehabilitacion">Kinesiologia y rehabilitacion
                                        </option>
                                        <option value="Etc">Etc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 d-none">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Equipamiento</label>
                                    <select class="form-control form-control-sm" name="editar_equip_ad"
                                        id="editar_equip_ad" multiple="multiple">
                                        <option value="Carro paro">Carro paro</option>
                                        <option value="Oxigenoterápia">Oxigenoterápia</option>
                                        <option value="Pabellon de yeso">Pabellon de yeso</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 d-none">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Cantidad de camillas</label>
                                    <input type="number" class="form-control form-control-sm"
                                        name="editar_n_camillas_box_servicio" id="editar_n_camillas_box_servicio">
                                </div>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Ubicación</label>
                                    <select class="form-control form-control-sm" name="editar_tpo_equip_servicio"
                                        id="editar_tpo_equip_servicio">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Piso 1</option>
                                        <option value="2">Piso 2</option>
                                        <option value="3">Piso 3</option>
                                        <option value="4">Piso 4</option>
                                        <option value="5">Piso 5</option>
                                        <option value="6">Piso 6</option>
                                        <option value="7">Piso 7</option>
                                        <option value="8">Piso 8</option>
                                        <option value="9">Piso 9</option>
                                        <option value="10">Piso 10</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sección</label>
                                    <select class="form-control form-control-sm" name="editar_seccion_box"
                                        id="editar_seccion_box">
                                        <option value="0">Seleccione</option>
                                        <option value="1">Pediatría</option>
                                        <option value="2">General</option>
                                        <option value="3">Ginecobstetricia</option>
                                        <option value="4">Rehabilitación</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Observaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4"
                                        onblur="this.rows=1;" name="editar_ot_pat_act_" id="editar_ot_pat_act_"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm mx-auto" onclick="editar_box()"><i
                            class="feather icon-save"></i> Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
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
            $("#rut_laboratorio").rut({
            formatOn: 'keyup',
            minimumLength: 2,
            validateOn: 'change',
            useThousandsSeparator : false
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

    /*-CENTRO MÉDICO-*/
    /*-Añadir especialidad-*/
    function ag_especialidad() {
        $('#a_especialidad').modal('show');
    }

    function ag_otra_especialidad() {
        $('#a_otra_especialidad').modal('show');
    }

    /*-Añadir área**/
    function ag_area() {
        $('#a_area').modal('show');
    }

    function ag_servicio() {
        $('#a_servicio').modal('show');
    }

    /*-Rol-*/
    function añadir_rol() {
        $('#a_rol').modal('show');


    }

    function ag_laboratorio() {
        $('#a_laboratorio').modal('show');
    }

    /*-Permisos-*/
    function anadir_permisos(nombre_tipo, id_tipo, id) {
        let url = '{{ route('adm_cm.cargar_personal_persona') }}';
        $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                data: {
                    // _token: CSRF_TOKEN,
                    nombre_tipo: nombre_tipo,
                    id_tipo: id_tipo,
                    id: id,
                    id_lugar_atencion: '{{ $institucion->id_lugar_atencion }}',
                },
            })
            .done(function(response) {

                if (response.estado == 1) {
                    $('#personal_id_persona').val(id);
                    $('#personal_id_personal').val(response.registro.rut);
                    $('#personal_id_lugar_atencion').val('{{ $institucion->id_lugar_atencion }}');
                    $('#personal_desha_rut').html(response.registro.rut);
                    $('#personal_desha_rut').html(response.registro.rut);
                    $('#personal_desha_nombre').html(response.registro.nombres + ' ' + response.registro
                        .apellido_uno + ' ' + response.registro.apellido_dos);
                    $('#personal_desha_rol').html(response.registro.asistente_tipo.nombre);
                    $('#personal_desha_correo').html(response.registro.email);
                    $('#personal_desha_clave').html(response.registro.asistente_lugar.token);
                    $('#personal_desha_clave_id').val(response.registro.asistente_lugar.id);

                    $('#personal_desha_clave_edit').val(response.registro.asistente_lugar.token);
                    $('#personal_desha_clave_id_edit').val(response.registro.asistente_lugar.id);
                    $('#personal_tipo_personal_edit').val(nombre_tipo);

                    $('#permisos_rol').modal('show');

                } else {
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

    function cambiarContrasenalugarAtencion() {
        var id_persona = $('#personal_id_persona').val();
        var id_personal = $('#personal_id_personal').val();
        var id_lugar_atencion = $('#personal_id_lugar_atencion').val();
        var desha_clave_edit = $('#personal_desha_clave_edit').val();
        var desha_clave_id_edit = $('#personal_desha_clave_id_edit').val();
        var tipo_personal = $('#personal_tipo_personal_edit').val();

        let url = '{{ route('adm_cm.actualizar_acceso_personal') }}';
        $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: CSRF_TOKEN,
                    tipo_personal: tipo_personal,
                    id_persona: id_persona,
                    id_personal: id_personal,
                    id_lugar_atencion: id_lugar_atencion,
                    clave: desha_clave_edit,
                    id_edit: desha_clave_id_edit,
                },
            })
            .done(function(response) {

                if (response.estado == 1) {
                    $('#permisos_rol').modal('hide');
                    swal({
                        title: "Clave de personal Actualizada",
                        icon: "success",
                        buttons: "Aceptar",
                    });
                } else {
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
    // function ag_sucursal() {
    //     $('#a_sucursal').modal('show');
    // }
    // /*-Editar sucursal-*/
    // function ed_sucursal() {
    //     $('#e_sucursal').modal('show');
    // }

    // /*-Asistentes de sucursal-*/
    // function asis_sucursal() {
    //     $('#asistentes_sucursal').modal('show');
    // }

    // /*-Horario sucursal -*/
    // function hor_sucursal() {
    //     $('#horario_sucursal').modal('show');
    // }

    /** PERFIL DE LA INSTITUCION */
    /** DATOS */
    function editar_datos_institucion() {

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
                    id_institucion: id_institucion,
                    rut: rut,
                    razon_social: razon_social,
                    nombre: nombre,
                    certificado_supersalud: certificado_supersalud,
                    tipo_institucion: tipo_institucion,
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
    function editar_contacto_institucion() {
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
                    id_institucion: id_institucion,
                    tipo_institucion: tipo_institucion,
                    email: email,
                    telefono: telefono,
                    whatsapp: whatsapp,
                    sitio_web: sitio_web,
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
    function editar_direccion_institucion() {
        let id_institucion = $('#id_institucion').val();
        let tipo_institucion = $('#tipo_institucion').val();
        let region = $('#editar_region').val();
        let ciudad = $('#editar_ciudad').val();
        let direccion = $('#editar_direccion').val();
        let numero_dir = $('#editar_numero_dir').val();
        let sucursal_val = $('#editar_sucursal').prop('checked')
        var sucursal = 0;
        if (sucursal_val)
            sucursal = 1;
        let url = "{{ route('adm_cm.editar_datos_perfil') }}";

        $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: CSRF_TOKEN,
                    id_institucion: id_institucion,
                    tipo_institucion: tipo_institucion,
                    region: region,
                    ciudad: ciudad,
                    direccion: direccion,
                    numero_dir: numero_dir,
                    sucursales: sucursal,
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
    function editar_responsable_datos_personales() {

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
                    id_responsable: id_responsable,
                    rut: rut,
                    nombres: nombre,
                    apellido_uno: apellido_uno,
                    apellido_dos: apellido_dos,
                    sexo: sexo,
                    fecha_nac: nac,
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

    function editar_responsable_medico_datos_personales(tipo_direccion) {
        var url = "{{ route('adm_cm.editar_datos_perfil_responsable_medico') }}";
        if(tipo_direccion == "director_medico"){
            var id_responsable = $('#id_director_cm').val();
            var rut = $('#perfil_rut_director_medico').val();
            var nombre = $('#perfil_nombre_director_medico').val();
            var apellido_uno = $('#perfil_apellido_uno_director_medico').val();
            var apellido_dos = $('#perfil_apellido_dos_director_medico').val();
            var sexo = $('input:radio[name=perfil_sexo_director_medico]:checked').val();
            var nac = $('#perfil_nac_director_medico').val();
            var ciudad = $('#perfil_ciudad_director_medico').val();
            var direccion = $('#perfil_dire_director_medico').val();
            var numero = $('#perfil_numero_dir_director_medico').val();
            var email = $('#perfil_email_director_medico').val();
            var telefono_uno = $('#perfil_fono_director_medico').val();
            var telefono_dos = $('#perfil_fono_dos_director_medico').val();
        }else if(tipo_direccion == "director_comercial"){
            var id_responsable = $('#id_director_comercial').val();
            var rut = $('#perfil_rut_subdirector_cm').val();
            var nombre = $('#perfil_nombre_subdirector_cm').val();
            var apellido_uno = $('#perfil_apellido_uno_subdirector_cm').val();
            var apellido_dos = $('#perfil_apellido_dos_subdirector_cm').val();
            var sexo = $('input:radio[name=perfil_sexo_subdirector_cm]:checked').val();
            var nac = $('#perfil_nac_subdirector_cm').val();
            var ciudad = $('#perfil_ciudad_subdirector_cm').val();
            var direccion = $('#perfil_direccion_subdirector_cm').val();
            var numero = $('#perfil_numero_direccion_subdirector_cm').val();
            var email = $('#perfil_email_subdirector_cm').val();
            var telefono_uno = $('#perfil_fono_subdirector_cm').val();
            var telefono_dos = $('#perfil_fono_dos_subdirector_cm').val();
        }else{
            var id_responsable = $('#id_director_farmacia').val();
            var rut = $('#perfil_rut_director_farmacia').val();
            var nombre = $('#perfil_nombre_director_farmacia').val();
            var apellido_uno = $('#perfil_apellido_uno_director_farmacia').val();
            var apellido_dos = $('#perfil_apellido_dos_director_farmacia').val();
            var sexo = $('input:radio[name=perfil_sexo_director_farmacia]:checked').val();
            var nac = $('#perfil_nac_director_farmacia').val();
            var ciudad = $('#perfil_ciudad_director_farmacia').val();
            var direccion = $('#perfil_dire_director_farmacia').val();
            var numero = $('#perfil_numero_dir_director_farmacia').val();
            var email = $('#perfil_email_director_farmacia').val();
            var telefono_uno = $('#perfil_fono_director_farmacia').val();
            var telefono_dos = $('#perfil_fono_dos_director_farmacia').val();
        }


        let data = {
            _token: CSRF_TOKEN,
            id_responsable: id_responsable,
            rut: rut,
            nombres: nombre,
            apellido_uno: apellido_uno,
            apellido_dos: apellido_dos,
            sexo: sexo,
            fecha_nac: nac,
            ciudad: ciudad,
            direccion: direccion,
            numero_dir: numero,
            email: email,
            telefono_uno: telefono_uno,
            telefono_dos: telefono_dos
        }

      console.log(data);

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
                    if(tipo_direccion == 'director_medico'){
                        let profesional = response.profesional;
                        $('#nombre_director_medico').html(profesional.nombre);
                        $('#apellido_uno_director_medico').html(profesional.apellido_uno);
                        $('#apellido_dos_director_medico').html(profesional.apellido_dos);
                        $('#rut_director_medico').html(profesional.rut);
                        $('#fecha_nacimiento_director_medico').html(profesional.fecha_nacimiento);
                        $('#comuna_director_medico').html(profesional.ciudad);
                        $('#direccion_director_medico').html(profesional.direccion.direccion + ' ' + profesional.direccion.numero_dir);
                        $('#telefono_uno_director_medico').html(profesional.telefono_uno);
                        $('#telefono_dos_director_medico').html(profesional.telefono_dos);
                        if(profesional.sexo == "M"){
                            $('#sexo_director_medico').html("Hombre");
                        }else{
                            $('#sexo_director_medico').html("Mujer");
                        }
                        $('#email_director_medico').html(profesional.email);
                    }else if(tipo_direccion == 'director_comercial'){
                        let profesional = response.profesional;
                        $('#nombre_subdirector_cm').html(profesional.nombre);
                        $('#apellido_uno_subdirector_cm').html(profesional.apellido_uno);
                        $('#apellido_dos_subdirector_cm').html(profesional.apellido_dos);
                        $('#rut_subdirector_cm').html(profesional.rut);
                        $('#nacimiento_subdirector_cm').html(profesional.fecha_nacimiento);
                        $('#comuna_subdirector_cm').html(profesional.ciudad);
                        $('#direccion_subdirector_cm').html(profesional.direccion.direccion + ' ' + profesional.direccion.numero_dir);
                        $('#telefono_uno_subdirector_cm').html(profesional.telefono_uno);
                        $('#telefono_dos_subdirector_cm').html(profesional.telefono_dos);
                        if(profesional.sexo == "M"){
                            $('#sexo_subdirector_cm').html("Hombre");
                        }else{
                            $('#sexo_subdirector_cm').html("Mujer");
                        }
                        $('#email_subdirector_cm').html(profesional.email);
                    }else{
                        let profesional = response.profesional;
                        $('#nombre_director_farmacia').html(profesional.nombre);
                        $('#apellido_uno_director_farmacia').html(profesional.apellido_uno);
                        $('#apellido_dos_director_farmacia').html(profesional.apellido_dos);
                        $('#rut_director_farmacia').html(profesional.rut);
                        $('#nacimiento_director_farmacia').html(profesional.fecha_nacimiento);
                        $('#comuna_director_farmacia').html(profesional.ciudad);
                        $('#direccion_director_farmacia').html(profesional.direccion.direccion + ' ' + profesional.direccion.numero_dir);
                        $('#telefono_uno_director_farmacia').html(profesional.telefono_uno);
                        $('#telefono_dos_director_farmacia').html(profesional.telefono_dos);
                        if(profesional.sexo == "M"){
                            $('#sexo_director_farmacia').html("Hombre");
                        }else{
                            $('#sexo_director_farmacia').html("Mujer");
                        }
                        $('#email_director_farmacia').html(profesional.email);
                    }
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

    function editar_responsable_datos_contacto() {
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
                    id_responsable: id_responsable,
                    email: email,
                    telefono_uno: fono,
                    telefono_dos: fono_dos,
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

    function editar_responsable_datos_residencia() {
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
                    id_responsable: id_responsable,
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
    function buscar_ciudad(id_ciudad = 0) {

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

                    if (id_ciudad != 0)
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

    function buscar_ciudad_responsable(id_ciudad = 0) {

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

                    if (id_ciudad != 0)
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

    function registrar_nuevo_empleado() {
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

        if (id_institucion == '') {
            valido = 0;
            mensaje += 'Campo requerido Institución\n';
        }
        if (id_lugar_atencion == '') {
            valido = 0;
            mensaje += 'Campo requerido Lugar Atención\n';
        }
        if (id_admin_creador == '') {
            valido = 0;
            mensaje += 'Campo requerido Usuario Creador\n';
        }
        if (id_tipo_admin_creador == '') {
            valido = 0;
            mensaje += 'Campo requerido Tipo Usuario Creador\n';
        }
        if (tipo_contrato == '') {
            valido = 0;
            mensaje += 'Campo requerido Tipo Contrato\n';
        }
        if (rut == '') {
            valido = 0;
            mensaje += 'Campo requerido RUT\n';
        }
        if (nombre == '') {
            valido = 0;
            mensaje += 'Campo requerido Nombre\n';
        }
        if (apellido_uno == '') {
            valido = 0;
            mensaje += 'Campo requerido Apellido Paterno\n';
        }
        if (apellido_dos == '') {
            valido = 0;
            mensaje += 'Campo requerido Apellido Materno\n';
        }
        if (email == '') {
            valido = 0;
            mensaje += 'Campo requerido Email\n';
        }
        if (telefono == '') {
            valido = 0;
            mensaje += 'Campo requerido Teléfono\n';
        }
        if (region == '') {
            valido = 0;
            mensaje += 'Campo requerido Región\n';
        }
        if (ciudad == '') {
            valido = 0;
            mensaje += 'Campo requerido Ciudad\n';
        }
        if (direccion == '') {
            valido = 0;
            mensaje += 'Campo requerido Dirección\n';
        }
        if (numero == '') {
            valido = 0;
            mensaje += 'Campo requerido Número\n';
        }
        if (dias_laborales == '') {
            valido = 0;
            mensaje += 'Campo requerido Días laborales\n';
        }
        if (hora_entrada == '') {
            valido = 0;
            mensaje += 'Campo requerido Hora entrada\n';
        }
        if (hora_salida == '') {
            valido = 0;
            mensaje += 'Campo requerido Hora salida\n';
        }
        if (hora_entrada_colacion == '') {
            valido = 0;
            mensaje += 'Campo requerido Hora entrada colación\n';
        }
        if (hora_salida_colacion == '') {
            valido = 0;
            mensaje += 'Campo requerido Hora salida colación\n';
        }
        if (clave_ingreso == '') {
            valido = 0;
            mensaje += 'Campo requerido clave_ingreso\n';
        }

        if (valido == 1) {
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
                        if (data.estado == 1) {

                        } else {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar personal",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    } else {
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

        } else {
            swal({
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function guardar_especialidad_cm() {
        var valido = 1;
        var mensaje = '';
        let id_institucion = $('#id_institucion').val();
        let especialidad = $('#especialidad_cm').val();
        let sub_tipo_especialidad = $('#sub_tipo_especialidad_cm').val();
        let num_profesionales = $('#num_profesionales').val();

        if (id_institucion == '') {
            valido = 0;
            mensaje += 'Campo requerido Institución\n';
        }
        if (especialidad == '') {
            valido = 0;
            mensaje += 'Campo requerido Especialidad\n';
        }
        if (sub_tipo_especialidad == '') {
            valido = 0;
            mensaje += 'Campo requerido Sub Tipo Especialidad\n';
        }
        if (num_profesionales == '') {
            valido = 0;
            mensaje += 'Campo requerido N° Profesionales\n';
        }

        if (valido == 1) {

            var data = {
                id_institucion: id_institucion,
                especialidad: especialidad,
                sub_tipo_especialidad: sub_tipo_especialidad,
                _token: CSRF_TOKEN,
                principal: 1,
                num_profesionales: num_profesionales,
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
                        if (data.estado == 1) {
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

                                   <td class="align-middle">
                                        <button type="button" class="btn btn-warning btn-icon" onclick="dame_especialidad_cm(${v.id})"><i class="feather icon-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_especialidad_cm(${v.id});"><i class="feather icon-x"></i></button>
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
                                        <button type="button" class="btn btn-warning btn-icon" onclick="eliminar_otra_especialidad_cm(${v.id})"><i class="feather icon-trash"></i></button>
                                    </td>
                                </tr>
                                `);
                            });
                        } else {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar especialidad",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    } else {
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

        } else {
            swal({
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

    }

    function guardar_otra_especialidad_cm() {
        var valido = 1;
        var mensaje = '';
        let id_institucion = $('#id_institucion').val();
        let especialidad = $('#especialidad_cm_otra').val();

        if (id_institucion == '') {
            valido = 0;
            mensaje += 'Campo requerido Institución\n';
        }
        if (especialidad == '') {
            valido = 0;
            mensaje += 'Campo requerido Especialidad\n';
        }

        if (valido == 1) {

            var data = {
                id_institucion: id_institucion,
                especialidad: especialidad,
                _token: CSRF_TOKEN,
                principal: 0,
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
                        if (data.estado == 1) {
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
                        } else {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar especialidad",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    } else {
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

    async function dame_especialidad_cm(id) {
        console.log(id);
        $('#id_especialidad_cm').val(id);
        // Construye la URL con la id adjunta
        var url = "{{ url('Administrador/dame_especialidad') }}/" + id;
        $.ajax({
                url: url,
                type: "get",
            })
            .done(async function(data) {
                // abrir modal
                $('#editar_especialidad').modal('show');
                console.log(data);
                if (data != null) {
                    $('#id_lugar_atencion').val(data.id_lugar_atencion);
                    $('#id_institucion').val(data.id_institucion);
                    $('#editar_especialidad_id').val(data.id);
                    $('#editar_especialidad_nombre').val(data.id_tipo_especialidad);

                    $('#editar_especialidad_num_profesionales').val(data.num_profesionales);
                    // Esperar a que se complete la función editar_buscar_sub_tipo_especialidad
                    await editar_buscar_sub_tipo_especialidad();

                    // Cargar el valor del ID en editar_especialidad_sub_tipo
                    $('#editar_especialidad_sub_tipo').val(data.id_sub_tipo);
                } else {
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

    function eliminar_especialidad_cm(id) {
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

    function confirmar_eliminar_especialidad_cm(id) {
        let id_institucion = $('#id_institucion').val();
        let data = {
            id_institucion: id_institucion,
            id: id,
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
                    if (data.estado == 1) {
                        let especialidades = data.especialidades;
                        $('#especialidades_cm tbody').empty();
                        $(especialidades).each(function(i, v) { // indice, valor
                            $('#especialidades_cm tbody').append(`
                            <tr>
                                <td class="align-items-left">${v.nombre}</td>
                                <td class="align-items-left">${v.sub_tipo}</td>
                                    <td class="align-items-left">
                                        ${v.num_profesionales}
                                    </td>

                                <td class="align-middle">
                                    <button type="button" class="btn btn-warning btn-icon" onclick="dame_especialidad_cm(${v.id})"><i class="feather icon-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_especialidad_cm(${v.id});"><i class="feather icon-x"></i></button>
                                </td>
                            </tr>
                            `);
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar especialidad",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
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

    function eliminar_otra_especialidad_cm(id) {
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

    function confirmar_eliminar_otra_especialidad_cm(id) {
        let id_institucion = $('#id_institucion').val();
        let data = {
            id_institucion: id_institucion,
            id: id,
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
                    if (data.estado == 1) {
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
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar especialidad",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
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

    function buscar_tipo_especialidad(id = '') {
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
                    if (data.length > 0) {
                        $(data).each(function(i, v) { // indice, valor
                            especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })
                    } else {
                        especialidades.append('<option value="0">No Aplica</option>');
                        especialidades.val(0);

                        let sub_especialidades = $('#agregar_profesional_nuevo_sub_tipo_especialidad');
                        sub_especialidades.append('<option value="0">No Aplica</option>');
                        sub_especialidades.val(0);
                    }
                    if (id != '')
                        especialidades.val(id);


                } else {
                    alert('No se pudo cargar los tipos de especialidad');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

    }

    function buscar_sub_tipo_especialidad(id = '') {
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
                    if (data.length > 0) {
                        $(data).each(function(i, v) { // indice, valor
                            sub_especialidades.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })
                    } else {
                        sub_especialidades.append('<option value="0">No Aplica</option>');
                        sub_especialidades.val(0);
                    }
                    if (id != '')
                        sub_especialidades.val(id);

                } else {
                    alert('No se pudo Cargar los tipos de especialidad');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }

    function editar_buscar_sub_tipo_especialidad(id = '') {
        return new Promise((resolve, reject) => {
            let sub_tipo_especialidad_registro = $('#agregar_profesional_nuevo_sub_tipo_especialidad');
            sub_tipo_especialidad_registro.find('option').remove();

            let especialidad = $('#editar_especialidad_nombre').val();
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
                        let sub_especialidades = $('#editar_especialidad_sub_tipo');

                        sub_especialidades.find('option').remove();
                        sub_especialidades.append('<option value="">Seleccione</option>');
                        if (data.length > 0) {
                            $(data).each(function(i, v) { // indice, valor
                                sub_especialidades.append('<option value="' + v.id + '">' + v
                                    .nombre + '</option>');
                            });
                        } else {
                            sub_especialidades.append('<option value="0">No Aplica</option>');
                            sub_especialidades.val(0);
                        }
                        if (id != '')
                            sub_especialidades.val(id);

                        resolve(); // Resuelve la promesa cuando se complete la operación
                    } else {
                        alert('No se pudo Cargar los tipos de especialidad');
                        reject(
                        'No se pudo Cargar los tipos de especialidad'); // Rechaza la promesa en caso de error
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError);
                    reject(thrownError); // Rechaza la promesa en caso de fallo en la solicitud AJAX
                });
        });
    }

    function cambiarEstadoEspecialidad(id) {
        let estado = $('#esp-' + id).prop('checked');
        if (estado)
            estado = 1;
        else
            estado = 0;
        let id_institucion = $('#id_institucion').val();
        let data = {
            id: id,
            estado: estado,
            id_institucion: id_institucion,
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
                    if (data.estado == 1) {
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
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cambiar estado",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
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

    function editar_direccion_medica(id_institucion) {
        let cargo = $('#cargo').val();
        let responsable = $('#responsable_cargo').val();

        // validar campos
        if (cargo == '' || cargo == 0) {
            swal({
                title: "Error",
                text: "Campo Cargo es requerido",
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
            return;
        }
        if (responsable == '' || responsable == 0) {
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
            cargo: cargo,
            responsable: responsable,
            id_institucion: id_institucion,
            _token: CSRF_TOKEN,
        }

        let url = "{{ route('adm_cm.editar_direccion_medica') }}";

        $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if (data.estado == 1) {
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
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar área profesional",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
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

    function eliminar_area_cm(id) {
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

    function confirmar_eliminar_area_profesional(id) {
        let data = {
            id: id,
            id_institucion: "{{ $institucion->id }}",
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
                    if (data.estado == 1) {
                        $('#contenedor_areas_cm').empty();
                        $('#contenedor_areas_cm').append(data.v);
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar área profesional",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
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

    function editar_especialidad_cm() {
        var numero_profesionales = $('#editar_especialidad_num_profesionales').val();
        var id_especialidad_cm = $('#id_especialidad_cm').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_institucion = $('#id_institucion').val();
        var id_sub_tipo_especialidad = $('#editar_especialidad_sub_tipo').val();

        var url = "{{ route('adm_cm.editar_especialidad') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                id_especialidad_cm: id_especialidad_cm,
                id_tipo_especialidad: id_sub_tipo_especialidad,
                numero_profesionales: numero_profesionales,
                id_lugar_atencion: id_lugar_atencion,
                id_institucion: id_institucion,
                _token: CSRF_TOKEN,
            },
            success: function(data) {
                console.log(data);
                if (data != null) {
                    if (data.estado == 1) {
                        // cerrar modal
                        $('#editar_especialidad').modal('hide');
                        $('#contenedor_especialidades_cm').empty();
                        $('#contenedor_especialidades_cm').append(data.v);
                        swal({
                            title: "Especialidad",
                            text: "Especialidad Actualizada Correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar área profesional",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar área profesional",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            },
            error: function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError);
            }
        });
    }

    function mostrar_div_servicio() {
        $('#div_form_servicio').toggleClass('d-none');
    }

    function guardar_nuevo_servicio() {
        let nombre_servicio = $('#nombre_servicio_').val();
        let rut_servicio = $('#rut_servicio').val();
        let telefono_servicio = $('#telefono_servicio').val();
        let email_servicio = $('#email_servicio').val();
        let anexo_servicio = $('#anexo_servicio').val();
        let institucion_servicio = $('#institucion_servicio').val();
        let id_responsable_servicio = $('#responsable_servicio').val();

        let valido = 1;
        let mensaje = '';

        // validar campos
        if (nombre_servicio == '') {
            valido = 0;
            mensaje += 'Campo requerido Nombre\n';
        }
        if (telefono_servicio == '') {
            valido = 0;
            mensaje += 'Campo requerido Teléfono\n';
        }
        if (email_servicio == '') {
            valido = 0;
            mensaje += 'Campo requerido Email\n';
        }
        if (anexo_servicio == '') {
            valido = 0;
            mensaje += 'Campo requerido Anexo\n';
        }
        if (id_responsable_servicio == '' || id_responsable_servicio == 0) {
            valido = 0;
            mensaje += 'Campo requerido Responsable\n';
        }

        if (valido == 1) {
            let data = {
                nombre_servicio: nombre_servicio,
                rut_servicio: rut_servicio,
                telefono_servicio: telefono_servicio,
                email_servicio: email_servicio,
                institucion_servicio: institucion_servicio,
                anexo_servicio: anexo_servicio,
                id_responsable_servicio: id_responsable_servicio,
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
                        if (data.estado == 1) {
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
                        } else {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar servicio",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar servicio",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                })

        } else {
            swal({
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function guardar_servicio() {
        let id_servicio = $('#servicio').val();
        let id_responsable = $('#responsable_servicio').val();
        id_servicio = parseInt(id_servicio);
        id_responsable = parseInt(id_responsable);
        let valido = 1;
        let mensaje = '';
        // validar campos
        if (id_servicio == 0) {
            valido = 0;
            mensaje += 'Campo requerido Servicio\n';
        }
        if (id_responsable == 0) {
            valido = 0;
            mensaje += 'Campo requerido Responsable\n';
        }


        if (valido == 1) {
            let data = {
                id_servicio: id_servicio,
                id_responsable: id_responsable,
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
                        if (data.estado == 1) {
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
                        } else {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar servicio",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar servicio",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                })

        } else {
            swal({
                title: "Campos requeridos",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function eliminar_servicio_cm(id) {
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

    function confirmar_eliminar_servicio(id) {
        let data = {
            id: id,
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
                    if (data.estado == 1) {
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
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar servicio",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
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

    function dame_area_cm(id, id_lugar_atencion) {
        // Construye la URL con la id adjunta
        var url = "{{ url('Administrador/dame_area') }}/" + id + "/" + id_lugar_atencion;
        $.ajax({
                url: url,
                type: "get",
            })
            .done(function(data) {
                // abrir modal
                $('#editar_area').modal('show');
                console.log(data);
                if (data != null) {
                    $('#editar_tipo_area').val(data.id_tipo_area_cm);
                    $('#editar_responsable_cargo_area').val(data.id_responsable);
                    $('#editar_e_cont').val(data.email);
                    $('#editar_tel_c').val(data.telefono);
                    $('#editar_n_pers').val(data.numero_personas);

                    $('#id_area').val(data.id);
                } else {
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

    function editar_area_cm(id_lugar_atencion) {
        let tipo_area = $('#editar_tipo_area').val();
        let responsable = $('#editar_responsable_cargo_area').val();
        let email = $('#editar_e_cont').val();
        let telefono = $('#editar_tel_c').val();
        let n_persons = $('#editar_n_pers').val();
        let id_institucion = "{{ $institucion->id }}";

        let valido = 1;
        let mensaje = '';

        // validar campos
        if (tipo_area == '' || tipo_area == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Tipo de Área</li>';
        }
        if (responsable == '' || responsable == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Responsable</li>';
        }
        if (email == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Email</li>';
        }
        if (telefono == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Teléfono</li>';
        }
        if (n_persons == '') {
            valido = 0;
            mensaje += 'Campo requerido Número de Personas</li>';
        }

        if (valido == 1) {
            let data = {
                tipo_area: tipo_area,
                responsable: responsable,
                email: email,
                telefono: telefono,
                n_persons: n_persons,
                id_lugar_atencion: id_lugar_atencion,
                id_area: $('#id_area').val(),
                id_institucion: id_institucion,
                _token: CSRF_TOKEN,
            }

            let url = "{{ route('adm_cm.editar_area_cm') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    console.log(data);
                    if (data != null) {
                        if (data.estado == 1) {
                            // cerrar modal
                            $('#editar_area').modal('hide');
                            let areas = data.areas;
                            $('#contenedor_areas_cm').empty();
                            $('#contenedor_areas_cm').append(data.v);
                        } else {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar área profesional",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar área profesional",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                })

        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function eliminar_admin_cm(tipo_admin, id_institucion) {
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

    function confirmar_eliminar_admin_cm(tipo_admin, id_institucion) {
        let data = {
            tipo_admin: tipo_admin,
            id_institucion: id_institucion,
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
                    if (data.estado == 1) {
                        swal({
                            title: "Administrador",
                            text: "Administrador Eliminado Correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                        $('#contenedor_administradores_cm').empty();
                        $('#contenedor_administradores_cm').html(data.v);
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar administrador",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
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

    function asignar_profesionales_area(id_area) {
        // abrir modal
        $('#asociar_profesionales_area').modal('show');
        $('#id_area').val(id_area);
    }

    function guardar_profesionales_area() {
        swal({
                title: "Asignar Profesionales",
                text: "¿Está seguro que desea asignar los profesionales al área?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_guardar_profesionales_area();
                }
            });
    }

    function confirmar_guardar_profesionales_area() {
        let id_responsable = $('#id_responsable').val();
        let id_lugar_atencion = $('#add_empleado_id_lugar_atencion').val();
        let profesionales = [];
        $('#profesionales_area option:selected').each(function(i, v) {
            profesionales.push($(this).val());
        });

        let data = {
            id_responsable: id_responsable,
            id_lugar_atencion: id_lugar_atencion,
            id_institucion: "{{ $institucion->id }}",
            profesionales: profesionales,
            id_area: $('#id_area').val(),
            _token: CSRF_TOKEN,
        }

        let url = "{{ route('adm_cm.asignar_profesionales_area') }}";

        $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if (data.mensaje == 'OK') {
                        // cerrar modal
                        $('#asociar_profesionales_area').modal('hide');
                        swal({
                            title: "Profesionales",
                            text: "Profesionales Asignados Correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                        $('#contenedor_areas_cm').empty();
                        $('#contenedor_areas_cm').html(data.v);
                    } else {
                        swal({
                            title: "Error",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar profesionales",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            })
    }

    function agregar_laboratorio() {
        let nombre_laboratorio = $('#nombre_laboratorio').val();
        let rut_laboratorio = $('#rut_laboratorio').val();
        let email_laboratorio = $('#email_laboratorio').val();
        let telefono_laboratorio = $('#telefono_laboratorio').val();
        let tipo_laboratorio = $('#tipo_laboratorio').val();
        let direccion_laboratorio = $('#direccion_laboratorio').val();
        let numero_laboratorio = $('#numero_laboratorio').val();
        let region = $('#region_laboratorio').val();
        let ciudad = $('#ciudad_laboratorio').val();
        // obtenemos el valor del radio button con id tipo_lab
        let ubicacion = $("input[name='tipo_lab']:checked").val();
        let id_institucion = $('#id_institucion').val();
        let id_responsable = $('#responsable_laboratorio').val();
        let id_lugar_atencion = $('#add_empleado_id_lugar_atencion').val();

        let valido = 1;
        let mensaje = '';
        // validar campos
        if (nombre_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Nombre</li>';
        }
        if (rut_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Rut</li>';
        }
        if (email_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Email</li>';
        }
        if (telefono_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Teléfono</li>';
        }
        if (tipo_laboratorio == '' || tipo_laboratorio == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Tipo</li>';
        }
        if (direccion_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Dirección</li>';
        }
        if (region == '' || region == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Región</li>';
        }
        if (ciudad == '' || ciudad == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Ciudad</li>';
        }
        if (numero_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Número</li>';
        }
        if (ubicacion == '' || ubicacion == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Ubicación</li>';
        }
        if (id_responsable == '' || id_responsable == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Responsable</li>';
        }

        if (valido == 1) {
            let data = {
                nombre_laboratorio: nombre_laboratorio,
                rut_laboratorio: rut_laboratorio,
                email_laboratorio: email_laboratorio,
                telefono_laboratorio: telefono_laboratorio,
                tipo_laboratorio: tipo_laboratorio,
                direccion_laboratorio: direccion_laboratorio,
                numero_laboratorio: numero_laboratorio,
                region_laboratorio: region,
                ciudad_laboratorio: ciudad,
                ubicacion: ubicacion,
                id_institucion: id_institucion,
                id_responsable: id_responsable,
                id_lugar_atencion: id_lugar_atencion,
                _token: CSRF_TOKEN,
            }

            let url = "{{ route('laboratorio.agregar_laboratorio') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    console.log(data);
                    if (data != null) {
                        if (data.estado == 1) {
                            swal({
                                title: "Laboratorio",
                                text: "Laboratorio Ingresado Correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                            $('#tabla_laboratorios').empty();
                            $('#tabla_laboratorios').append(data.v);
                            // cerrar modal
                            $('#a_laboratorio').modal('hide');
                            limpiar_formulario_laboratorio();
                        } else {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar laboratorio",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar laboratorio",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                })
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

    }

    function limpiar_formulario_laboratorio() {
        $('#nombre_laboratorio').val('');
        $('#rut_laboratorio').val('');
        $('#email_laboratorio').val('');
        $('#telefono_laboratorio').val('');
        $('#tipo_laboratorio').val('');
        $('#direccion_laboratorio').val('');
        $('#numero_laboratorio').val('');
        $('#region_laboratorio').val('');
        $('#ciudad_laboratorio').val('');
        $('#ubicacion').val('');
        $('#responsable_laboratorio').val('');
    }

    function limpiar_formulario_laboratorio_editar() {
        $('#editar_nombre_laboratorio').val('');
        $('#editar_rut_laboratorio').val('');
        $('#editar_email_laboratorio').val('');
        $('#editar_telefono_laboratorio').val('');
        $('#editar_tipo_laboratorio').val('');
        $('#editar_direccion_laboratorio').val('');
        $('#editar_numero_laboratorio').val('');
        $('#editar_region_laboratorio').val('');
        $('#editar_ciudad_laboratorio').val('');
        $('#editar_ubicacion').val('');
        $('#editar_responsable_laboratorio').val('');
    }

    function buscar_ciudad_laboratorio(id_ciudad = 0) {

        let region = $('#region_laboratorio').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            }).done(function(data) {
                console.log(data);
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#ciudad_laboratorio');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if (id_ciudad != 0)
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

    function buscar_ciudad_laboratorio_editar(id_ciudad = 0) {

        let region = $('#editar_region_laboratorio').val();
        let url = "{{ route('adm_cm.buscar_ciudad_region') }}";
        $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    region: region,
                },
            }).done(function(data) {
                console.log(data);
                if (data != null) {
                    data = JSON.parse(data);

                    let ciudades = $('#editar_ciudad_laboratorio');

                    ciudades.find('option').remove();
                    ciudades.append('<option value="0">seleccione</option>');
                    $(data).each(function(i, v) { // indice, valor
                        ciudades.append('<option value="' + v.id + '">' + v.nombre +
                            '</option>');
                    })

                    if (id_ciudad != 0)
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

    function eliminar_laboratorio_cm(id) {
        swal({
                title: "Eliminar Laboratorio",
                text: "¿Está seguro que desea eliminar el laboratorio?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_eliminar_laboratorio_cm(id);
                }
            });
    }

    function confirmar_eliminar_laboratorio_cm(id) {
        let data = {
            id: id,
            id_institucion: $('#id_institucion').val(),
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('laboratorio.eliminar_laboratorio_cm') }}";
        $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if (data.estado == 1) {
                        $('#tabla_laboratorios').empty();
                        $('#tabla_laboratorios').append(data.v);
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar laboratorio",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar laboratorio",
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

    function dame_laboratorio_cm(id_laboratorio) {
        // Construye la URL con la id adjunta
        var url = "{{ url('Laboratorio/dame_laboratorio') }}/" + id_laboratorio;
        $.ajax({
                url: url,
                type: "get",
            })
            .done(function(data) {
                // abrir modal
                $('#editar_laboratorio').modal('show');
                console.log(data);
                if (data != null) {
                    $('#editar_nombre_laboratorio').val(data.nombre);
                    $('#editar_rut_laboratorio').val(data.rut);
                    $('#editar_email_laboratorio').val(data.email);
                    $('#editar_telefono_laboratorio').val(data.telefono);
                    $('#editar_tipo_laboratorio').val(data.tipo_sucursal);
                    // checkear radio button
                    $("input[name='editar_tipo_lab']:checked").prop('checked', false);
                    $("input[name='editar_tipo_lab'][value='" + data.ubicacion + "']").prop('checked', true);
                    $('#editar_direccion_laboratorio').val(data.direccion);
                    $('#editar_numero_laboratorio').val(data.numero_dir);
                    $('#editar_region_laboratorio').val(data.id_region);
                    buscar_ciudad_laboratorio_editar(data.id_ciudad);
                    $('#editar_ubicacion').val(data.ubicacion);
                    $('#editar_responsable_laboratorio option:selected').removeAttr('selected');
                    $('#editar_responsable_laboratorio option[value="' + data.id_responsable + '"]').attr(
                        'selected', 'selected');
                    $('#id_laboratorio').val(data.id);
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar laboratorio",
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

    function horario_laboratorio_cm(id){
        $('#modal_editar_horario_atencion').modal('show');
        $('#mi_horario_id_lab').val(id);
        mi_horario_lab(id);
    }

    function editar_laboratorio() {
        let nombre_laboratorio = $('#editar_nombre_laboratorio').val();
        let rut_laboratorio = $('#editar_rut_laboratorio').val();
        let email_laboratorio = $('#editar_email_laboratorio').val();
        let telefono_laboratorio = $('#editar_telefono_laboratorio').val();
        let tipo_laboratorio = $('#editar_tipo_laboratorio').val();
        let direccion_laboratorio = $('#editar_direccion_laboratorio').val();
        let numero_laboratorio = $('#editar_numero_laboratorio').val();
        let region = $('#editar_region_laboratorio').val();
        let ciudad = $('#editar_ciudad_laboratorio').val();
        // obtenemos el valor del radio button con id tipo_lab
        let ubicacion = $("input[name='editar_tipo_lab']:checked").val();
        let id_institucion = $('#id_institucion').val();
        let id_responsable = $('#editar_responsable_laboratorio').val();
        let id_lugar_atencion = $('#add_empleado_id_lugar_atencion').val();
        let id_laboratorio = $('#id_laboratorio').val();

        let valido = 1;
        let mensaje = '';
        // validar campos
        if (nombre_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Nombre</li>';
        }
        if (rut_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Rut</li>';
        }
        if (email_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Email</li>';
        }
        if (telefono_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Teléfono</li>';
        }
        if (tipo_laboratorio == '' || tipo_laboratorio == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Tipo</li>';
        }
        if (direccion_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Dirección</li>';
        }
        if (region == '' || region == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Región</li>';
        }
        if (ciudad == '' || ciudad == 0 || ciudad == null) {
            valido = 0;
            mensaje += '<li>Campo requerido Ciudad</li>';
        }
        if (numero_laboratorio == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Número</li>';
        }
        if (ubicacion == '' || ubicacion == 0 || ubicacion == null) {
            valido = 0;
            mensaje += '<li>Campo requerido Ubicación</li>';
        }
        if (id_responsable == '' || id_responsable == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Responsable</li>';
        }

        if (valido == 1) {
            let data = {
                nombre_laboratorio: nombre_laboratorio,
                rut_laboratorio: rut_laboratorio,
                email_laboratorio: email_laboratorio,
                telefono_laboratorio: telefono_laboratorio,
                tipo_laboratorio: tipo_laboratorio,
                direccion_laboratorio: direccion_laboratorio,
                numero_laboratorio: numero_laboratorio,
                region_laboratorio: region,
                ciudad_laboratorio: ciudad,
                ubicacion: ubicacion,
                id_institucion: id_institucion,
                id_responsable: id_responsable,
                id_lugar_atencion: id_lugar_atencion,
                id_laboratorio: id_laboratorio,
                _token: CSRF_TOKEN,
            }

            console.log(data);

            let url = "{{ route('laboratorio.editar_laboratorio') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    console.log(data);
                    if (data != null) {
                        if (data.estado == 1) {
                            swal({
                                title: "Laboratorio",
                                text: "Laboratorio Actualizado Correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                            $('#tabla_laboratorios').empty();
                            $('#tabla_laboratorios').append(data.v);
                            // cerrar modal
                            $('#editar_laboratorio').modal('hide');
                            $('#tabla_laboratorios').empty();
                            $('#tabla_laboratorios').append(data.v);
                            limpiar_formulario_laboratorio_editar();
                        } else {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar laboratorio",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar laboratorio",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                })
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }

    }

    function dame_box(id_box) {
        // Construye la URL con la id adjunta
        var url = "{{ url('dame_box') }}/" + id_box;
        $('#id_box').val(id_box);
        $.ajax({
                url: url,
                type: "get",
            })
            .done(function(data) {
                // abrir modal
                $('#editar_box').modal('show');
                console.log(data);
                if (data != null) {
                    $('#editar_numero_box').val(data.box.numero_box);
                    $('#editar_tpo_box_servicio').val(data.box.tipo_box);
                    if (data.box.tipo_box == 'Especializado') {
                        $('#editar_contenedor_tpo_especializacion').removeClass('d-none');
                    } else {
                        $('#editar_contenedor_tpo_especializacion').addClass('d-none');
                    }
                    $('#editar_tpo_especializacion').val(data.box.tipo_especializacion);
                    $('#editar_tpo_equip_servicio').val(data.box.ubicacion);
                    $('#editar_seccion_box').val(data.box.seccion);
                    $('#editar_ot_pat_act_').val(data.box.observaciones);
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar box",
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

    function editar_box() {
        var id_box = $('#id_box').val();
        var numero_box = $('#editar_numero_box').val();
        var tpo_box_servicio = $('#editar_tpo_box_servicio').val();
        var tpo_especializacion = $('#editar_tpo_especializacion').val();
        var tpo_equip_servicio = $('#editar_tpo_equip_servicio').val();
        var seccion_box = $('#editar_seccion_box').val();
        var ot_pat_act_ = $('#editar_ot_pat_act_').val();
        var id_institucion = $('#id_institucion').val();
        var id_lugar_atencion = $('#add_empleado_id_lugar_atencion').val();

        let valido = 1;
        let mensaje = '';
        // validar campos
        if (numero_box == '') {
            valido = 0;
            mensaje += '<li>Campo requerido Número</li>';
        }
        if (tpo_box_servicio == '' || tpo_box_servicio == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Tipo</li>';
        }
        if (tpo_equip_servicio == '' || tpo_equip_servicio == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Ubicación</li>';
        }
        if (seccion_box == '' || seccion_box == 0) {
            valido = 0;
            mensaje += '<li>Campo requerido Sección</li>';
        }

        if (valido == 1) {
            let data = {
                id_box: id_box,
                numero_box: numero_box,
                tpo_box_servicio: tpo_box_servicio,
                tpo_especializacion: tpo_especializacion,
                tpo_equip_servicio: tpo_equip_servicio,
                seccion_box: seccion_box,
                ot_pat_act_: ot_pat_act_,
                id_institucion: id_institucion,
                id_lugar_atencion: id_lugar_atencion,
                _token: CSRF_TOKEN,
            }

            let url = "{{ route('adm_cm.editar_box_servicio') }}";

            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                })
                .done(function(data) {
                    console.log(data);
                    if (data != null) {
                        if (data.estado == 1) {
                            swal({
                                title: "Box",
                                text: "Box Actualizado Correctamente",
                                icon: "success",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                            $('#tabla_boxes_atencion').empty();
                            $('#tabla_boxes_atencion').append(data.v);
                            // cerrar modal
                            $('#editar_box').modal('hide');
                        } else {
                            swal({
                                title: "Error",
                                text: "Error al cargar ingresar box",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            });
                        }
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar box",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                });
        } else {
            swal({
                title: "Campos requeridos",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: mensaje,
                    },
                },
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function eliminar_box(id) {
        swal({
                title: "Eliminar Box",
                text: "¿Está seguro que desea eliminar el box?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_eliminar_box(id);
                }
            });
    }

    function confirmar_eliminar_box(id) {
        let data = {
            id: id,
            id_institucion: $('#id_institucion').val(),
            id_lugar_atencion: $('#add_empleado_id_lugar_atencion').val(),
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('adm_cm.eliminar_box_servicio') }}";
        $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if (data.estado == 1) {
                        $('#tabla_boxes_atencion').empty();
                        $('#tabla_boxes_atencion').append(data.v);
                        swal({
                            title: "Box",
                            text: "Box Eliminado Correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                        // cerrar modal
                        $('#editar_box').modal('hide');
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar box",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar box",
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

    function mi_horario_lab(id) {

            let id_lab = id;
            let url = "{{ route('laboratorio.mi_horario_lab') }}";

            $('#mi_horario_table tbody').empty();
            $('#duracion_horario').val(0);
            $('#tipo_agenda_medica').val(0);
            $('#dia_horario').val(0);
            $('#hora_inicio_horario').val(0);
            $('#hora_termino_horario').val(0);

            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        id_lab: id_lab,
                    },
                })
                .done(function(data) {


                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data);

                        $('#modal_editar_horario_atencion').modal('show');
                        $('#mi_horario_id_lugar_atencion').val(id);
                        for (i = 0; i < data.length; i++) {

                            let id = data[i].id;
                            let hora_inicio = data[i].hora_inicio;
                            let hora_termino = data[i].hora_termino;
                            let id_lugar_atencion = data[i].id_lugar_atencion;
                            let dia = '';
                            dias = data[i].dia.split(',');
                            for (let i = 0; i < dias.length; i++) {
                                if (dias[i] == 1) {

                                    dia += 'Lunes '
                                } else if (dias[i] == 2) {
                                    dia += 'Martes '

                                } else if (dias[i] == 3) {

                                    dia += 'Miercoles '
                                } else if (dias[i] == 4) {
                                    dia += 'Jueves '

                                } else if (dias[i] == 5) {
                                    dia += 'Viernes '

                                }else if(dias[i] == 6) {
                                    dia += 'Sábado '
                                }
                            }

                            let j = 1; //contador para asignar id al boton que borrara la fila
                            let fila = '<tr class="tr_horario" id="row' + j +
                                '"><td class="text-center align-middle">PROCEDIMIENTOS</td> <td class="text-center align-middle">' +
                                hora_inicio + '</td><td class="text-center align-middle">' +
                                hora_termino + '</td><td class="text-center align-middle">' +
                                dia + '</td><td class="text-center align-middle">' +
                                '<input class="btn btn-danger btn-sm btn-icon" title="Eliminar día" type="button" id="btn_eliminar_dia" name="btn_eliminar_dia" onclick="eliminar_dia_horario(' +
                                id + ',' + id_lugar_atencion + ' );" value="X" > </td>' +
                                '</tr>'; //esto seria lo que contendria la fila

                            j++;

                            $('#mi_horario_table tbody').append(fila);

                        }

                    } else {
                        alert('No se pudo Confirmar Reserva');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function eliminar_dia_horario(id, id_lugar_atencion) {

            let id_horario = id;
            let lugar_atencion = id_lugar_atencion;
            let token = CSRF_TOKEN;
            let tipo = "laboratorio";
            let url = "{{ route('profesional.eliminar_horario_agenda') }}";

            console.log(id_horario, lugar_atencion, token);

            $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        _token: CSRF_TOKEN,
                        id_horario: id_horario,
                        id_lugar_atencion: lugar_atencion,
                        tipo: tipo
                    },
                })
                .done(function(response) {
                    console.log(response);
                    if (response.success) {
                        swal({
                            title: "Horario Eliminado correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })

                        $('#modal_editar_horario_atencion').modal('hide');
                        mi_horario_lugar_atencion(lugar_atencion);

                        // $('#table_alergias_paciente tbody').empty();
                        // for (i = 0; i < response.alergias.length; i++) {

                        //     // var fecha = formatDate(data[i].created_at);
                        //     //var salida = formato(fecha);
                        //     var nombre_alergia = response.alergias[i].nombre_alergia;
                        //     // var tipo = data[i].tipo_examen;
                        //     // var prioridad = data[i].id_prioridad;

                        //     var j = 1; //contador para asignar id al boton que borrara la fila
                        //     var fila = '<tr class="tr_alergias_paciente" id="row' + j + '"><td>' +
                        //         nombre_alergia + '</td><td>' +
                        //         'botones' +
                        //         '</td></tr>'; //esto seria lo que contendria la fila

                        //     j++;

                        //     $('#table_alergias_paciente tbody').append(fila);

                        // }


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

    function eliminar_bodega(id) {
        swal({
                title: "Eliminar Bodega",
                text: "¿Está seguro que desea eliminar la bodega?",
                icon: "warning",
                buttons: ["Cancelar", "Aceptar"],
                DangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    confirmar_eliminar_bodega(id);
                }
            });
    }

    function confirmar_eliminar_bodega(id) {
        let data = {
            id: id,
            id_institucion: $('#id_institucion').val(),
            _token: CSRF_TOKEN,
        };
        let url = "{{ route('bodega.eliminar_bodega') }}";
        $.ajax({
                url: url,
                type: "post",
                data: data,
            })
            .done(function(data) {
                console.log(data);
                if (data != null) {
                    if (data.estado == 'ok') {
                        $('#contenedor_bodegas').empty();
                        $('#contenedor_bodegas').append(data.v);
                        swal({
                            title: "Bodega",
                            text: "Bodega Eliminada Correctamente",
                            icon: "success",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: "Error al cargar ingresar bodega",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        });
                    }
                } else {
                    swal({
                        title: "Error",
                        text: "Error al cargar ingresar bodega",
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


        function mi_horario_agregar() {

                let id_lab = $('#mi_horario_id_lab').val();
                let url = "{{ route('laboratorio.mi_horario_lab_agregar') }}";
                let duracion = $('#duracion_horario').val();
                let tipo = $('#tipo_agenda_medica').val();
                if (tipo == 0) {
                    $('#modal_editar_horario_atencion').modal('hide');
                    swal({
                        title: "Error",
                        text: "Debe ingresar un tipo de agenda",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    }).then(function(){
                        $('#modal_editar_horario_atencion').modal('show');
                    });


                    return;
                }
                if (duracion == 0) {
                    $('#modal_editar_horario_atencion').modal('hide');
                    swal({
                        title: "Error",
                        text: "Debe ingresar una duracion",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    }).then(function(){
                        $('#modal_editar_horario_atencion').modal('show');
                    });

                    return;
                }




                let dia = $('#dia_horario').val();
                if (dia == 0) {
                    $('#modal_editar_horario_atencion').modal('hide');
                    swal({
                        title: "Error",
                        text: "Debe ingresar un dia",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    }).then(function(){
                        $('#modal_editar_horario_atencion').modal('show');
                    });
                    // alert('no selecciono dia de consulta');
                    return;
                }
                let hora_inicio = $('#hora_inicio_horario').val();
                if (hora_inicio == 0) {
                    $('#modal_editar_horario_atencion').modal('hide');
                    swal({
                        title: "Error",
                        text: "Debe ingresar una hora de inicio",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    }).then(function(){
                        $('#modal_editar_horario_atencion').modal('show');
                    });
                    // alert('no selecciono hora de inicio de consulta');
                    return;
                }
                let hora_termino = $('#hora_termino_horario').val();
                if (hora_termino == 0) {
                     $('#modal_editar_horario_atencion').modal('hide');
                    swal({
                        title: "Error",
                        text: "Debe ingresar una hora de termino",
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    }).then(function(){
                        $('#modal_editar_horario_atencion').modal('show');
                    });
                    // alert('no selecciono hora de termino de consulta');
                    return;
                }
                let tipo_agenda_medica = $('#tipo_agenda_medica').val();


                $.ajax({

                        url: url,
                        type: "get",
                        data: {
                            //_token: _token,
                            id_lab: id_lab,
                            duracion: duracion,
                            dia: dia,
                            hora_inicio: hora_inicio,
                            hora_termino: hora_termino,
                            tipo_agenda_medica: tipo_agenda_medica,
                        },
                    })
                    .done(function(data) {
                        console.log(data);
                        if (data == 'Failed') {
                            swal({
                                title: "Error",
                                text: "Error, horario ya se encuentra registrado",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            // alert('Horario Topa con otro')
                        }

                        if (data != null) {
                            data = JSON.parse(data);
                            console.log(data);

                            $('#modal_editar_horario_atencion').modal('hide');
                            mi_horario_lab(id_lab);

                        } else {
                            swal({
                                title: "Error",
                                text: "No se pudo Confirmar Reserva",
                                icon: "error",
                                buttons: "Aceptar",
                                DangerMode: true,
                            })
                            // alert('No se pudo Confirmar Reserva');
                        }

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            };

             /** validar tipo agenda */
        function validar_tipo_agenda()
        {
            var valor = $('#tipo_agenda_medica').val();
            if(valor == 5 || valor == 2)
            {
                $('#duracion_horario').val('00:15:00');
                $('#duracion_horario').attr('disabled', true);
            }
            else
            {
                $('#duracion_horario').val('0');
                $('#duracion_horario').attr('disabled', false);
            }
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

        function checkboxChanged(checkbox){
            console.log(checkbox);
            let id = $(checkbox).data('id');
            console.log('ID del elemento:', id);

            let url = "{{ route('adm_cm.cambiar_estado_box') }}";
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    'id': id,
                    'estado': $(checkbox).prop('checked') ? 1 : 0,
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('Respuesta del servidor:', response);
                },
                error: function(xhr, status, error) {
                    console.error('Error en la solicitud AJAX:', error);
                }
            });
        }
</script>
@endsection
