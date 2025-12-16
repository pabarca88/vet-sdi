  @extends('template/administracion/template')
  @section('content')


      <div class="loader-bg">
          <div class="loader-track">
              <div class="loader-fill">
              </div>
          </div>
      </div>

      <!--****Container Completo****-->
      <div class="pcoded-main-container">
          <div class="pcoded-content">
              <div class="page-header">
                  <div class="page-block">
                      <div class="row align-items-center">
                          <div class="col-md-12">
                              <div class="page-header-title">
                                  <h5 class="m-b-10 font-weight-bold">Administrador General S.D.I</h5>
                              </div>
                              <ul class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="inicio_admin.php" data-toggle="tooltip"
                                          data-placement="top" title="Volver a mi escritorio"><i
                                              class="feather  icon-home"></i></a></li>
                                  <li class="breadcrumb-item"><a href="#!">Administrador de Roles</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-body">
                              <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link active" id="administradores-tab" data-toggle="tab"
                                          href="#administradores" role="tab" aria-controls="administradores"
                                          aria-selected="false">Administradores S.D.I</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="turno_prof-tab" data-toggle="tab" href="#turno_prof"
                                          role="tab" aria-controls="turno_prof" aria-selected="false">Profesionales de
                                          Turno</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link " id="adm_comerciales-tab" data-toggle="tab"
                                          href="#adm_comerciales" role="tab" aria-controls="adm_comerciales"
                                          aria-selected="false">Administradores Comerciales</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" id="administrativos-tab" data-toggle="tab"
                                          href="#administrativos" role="tab" aria-controls="administrativos"
                                          aria-selected="false">Personal administrativo S.D.I</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link " id="personal_apoyo-tab" data-toggle="tab"
                                          href="#personal_apoyo" role="tab" aria-controls="personal_apoyo"
                                          aria-selected="false">Otros S.D.I</a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <!--Cierre: Card Nav Pills-->
                      <div class="tab-content" id="personal_cm">
                          <div class="tab-pane fade active show" id="administradores" role="tabpanel"
                              aria-labelledby="administradores-tab">
                              <div class="row mb-n4">
                                  <div class="col-sm-12">
                                      <div class="card">
                                          <div class="card-header bg-info">
                                              <div class="col-md-12">
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <h4 class="text-white f-20 mt-2 mb-2 float-left">Administradores
                                                              Salud Digital Integrada</h4>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="btn-group mr-2 float-right mt- mb-">
                                                              <button type="button" class="btn btn-sm btn-outline-light"
                                                                  onclick="registroNuevoAdmr();"><i class="fa fa-plus"
                                                                      aria-hidden="true"></i> Registrar nuevo/a
                                                                  Administrador</button>
                                                              <button type="button"
                                                                  class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split"
                                                                  data-toggle="dropdown" aria-haspopup="true"
                                                                  aria-expanded="false"><span class="sr-only">Toggle
                                                                      Dropdown</span></button>
                                                              <div class="dropdown-menu">
                                                                  <button class="dropdown-item" type="button"
                                                                      class="btn  btn-primary"
                                                                      onclick="asociarAdm();">Asociar administrador</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body">



                                              <div class="row">
                                                  <div class="col-md-12 mb-3">
                                                  </div>
                                              </div>
                                              <div style="overflow-x:auto;">
                                                  <table id="tabla_administradores_sdi"
                                                      class="display table table-striped table-hover dt-responsive nowrap"
                                                      style="width:100%">
                                                      <thead>
                                                          <tr>
                                                              <th class="text-center align-middle">Cod_Rol</th>
                                                              <th class="text-center align-middle">Cargo</th>
                                                              <th class="text-center align-middle">Nombre/Rut</th>
                                                              <th class="text-center align-middle">Contacto</th>
                                                              <th class="text-center align-middle">Descripción</th>
                                                              <th class="text-center align-middle">Fecha_creación</th>
                                                              <th class="text-center align-middle">Responsable/Cargo</th>
                                                              <th class="text-center align-middle">Autorizar Roles</th>
                                                              <th class="text-center align-middle">Autorizar Menú</th>
                                                              <th class="text-center align-middle">eliminar</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>

                                                          @foreach ($usuarios as $user)

                                                              @if ($user->Nombre != '')
                                                                  <tr>
                                                                      <td class="align-middle text-center">
                                                                          <span>{{ $user->id }}</span>
                                                                      </td>
                                                                      <td class="align-middle text-center">
                                                                          <span>{{ $user->getRoleNames()->first() }}</span>
                                                                      </td>
                                                                      <td class="align-middle text-center">
                                                                          <span>{{ $user->Nombre }} </span><br>
                                                                          <span>{{ $user->Rut }}</span>
                                                                      </td>
                                                                      <td class="align-middle text-center">
                                                                          <!--Botón Modal-->
                                                                          <button type="button"
                                                                              class="btn btn-info btn-sm btn-icon"
                                                                              onclick="Contactoadm();" data-toggle="tooltip"
                                                                              data-placement="top"
                                                                              title="Ficha de Contacto"><i
                                                                                  class="fas fa-id-card-alt"></i></button>
                                                                      </td>
                                                                      <td class="align-middle text-center">
                                                                          <!--Botón Modal-->
                                                                          <button type="button"
                                                                              class="btn btn-info btn-sm btn-icon"
                                                                              onclick="descripCargoP();"
                                                                              data-toggle="tooltip" data-placement="top"
                                                                              title="Ficha del Cargo"><i
                                                                                  class="feather icon-camera"></i></button>
                                                                      </td>
                                                                      <td class="align-middle text-center">
                                                                          <span><strong>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</strong></span>
                                                                      </td>
                                                                      <td class="align-middle text-center">
                                                                          <span>Jkriman</span><br>
                                                                          <span>Administrador General</span>
                                                                      </td>
                                                                      <td class="align-middle text-center">
                                                                          <!--Botón Modal-->
                                                                          <button type="button"
                                                                              class="btn btn-success btn-sm btn-icon"
                                                                              onclick="Aut_rolesAG();" data-toggle="tooltip"
                                                                              data-placement="top"
                                                                              title="Autorizar Roles"><i
                                                                                  class="fas fa-sitemap"></i></button>
                                                                      </td>
                                                                      <td class="align-middle text-center">
                                                                          <!--Botón Modal-->
                                                                          <button type="button"
                                                                              class="btn btn-info btn-sm btn-icon"
                                                                              onclick="Aut_menuAG();" data-toggle="tooltip"
                                                                              data-placement="top"
                                                                              title="Autorizar Módulos"><i
                                                                                  class="feather icon-crosshair"></i></button>
                                                                      </td>
                                                                      <td class="align-middle text-center">
                                                                          <!--Botón Modal-->
                                                                          <button type="button"
                                                                              class="btn btn-danger btn-sm btn-icon"
                                                                              onclick="desasociar();" data-toggle="tooltip"
                                                                              data-placement="top"
                                                                              title="Desasociar Cargo"><i
                                                                                  class="feather icon-slash"></i></button>
                                                                      </td>
                                                                  </tr>
                                                              @endif

                                                          @endforeach

                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane fade" id="turno_prof" role="tabpanel" aria-labelledby="turno_prof-tab">
                              <div class="row mb-n4">
                                  <div class="col-sm-12">
                                      <div class="card">
                                          <div class="card-header bg-info">
                                              <div class="col-md-12">
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales de
                                                              la Salud Turno S.D.I</h4>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="btn-group mr-2 float-right mt- mb-">

                                                              <button type="button" class="btn btn-sm btn-outline-light"
                                                                  onclick="registroNuevoMt();"><i class="fa fa-plus"
                                                                      aria-hidden="true"></i> Registrar nuevo/a
                                                                  profesional</button>
                                                              <button type="button"
                                                                  class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split"
                                                                  data-toggle="dropdown" aria-haspopup="true"
                                                                  aria-expanded="false"><span class="sr-only">Toggle
                                                                      Dropdown</span></button>
                                                              <div class="dropdown-menu">
                                                                  <button class="dropdown-item" type="button"
                                                                      class="btn  btn-primary"
                                                                      onclick="asociarmedturno();">Asociar
                                                                      profesional</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body">
                                              <div class="row">
                                                  <div class="col-md-12 mb-3">
                                                  </div>
                                              </div>
                                              <div style="overflow-x:auto;">
                                                  <table id="tabla_profesionalesT"
                                                      class="display table table-striped table-hover dt-responsive nowrap"
                                                      style="width:100%">
                                                      <thead>
                                                          <tr>
                                                              <th class="text-center align-middle">Cod_Rol</th>
                                                              <th class="text-center align-middle">Cargo</th>
                                                              <th class="text-center align-middle">Nombre/Rut</th>
                                                              <th class="text-center align-middle">Contacto</th>
                                                              <th class="text-center align-middle">Descripción</th>
                                                              <th class="text-center align-middle">Fecha_creación</th>
                                                              <th class="text-center align-middle">Responsable/Cargo</th>
                                                              <th class="text-center align-middle">Autorizar Roles</th>
                                                              <th class="text-center align-middle">Autorizar Menú</th>
                                                              <th class="text-center align-middle">eliminar</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                          <tr>
                                                              <td class="align-middle text-center">
                                                                  <span>#002</span>
                                                              </td>
                                                              <td class="align-middle text-center">
                                                                  <span>Médico de Turno</span>
                                                              </td>
                                                              <td class="align-middle text-center">
                                                                  <span>Julian Venegas conta </span><br>
                                                                  <span>7298785-k</span>
                                                              </td>
                                                              <td class="align-middle text-center">
                                                                  <!--Botón Modal-->
                                                                  <button type="button"
                                                                      class="btn btn-info btn-sm btn-icon"
                                                                      onclick="Contactoadm();" data-toggle="tooltip"
                                                                      data-placement="top" title="Ficha de Contacto"><i
                                                                          class="fas fa-id-card-alt"></i></button>
                                                              </td>
                                                              <td class="align-middle text-center">
                                                                  <!--Botón Modal-->
                                                                  <button type="button"
                                                                      class="btn btn-info btn-sm btn-icon"
                                                                      onclick="descripCargoMT();" data-toggle="tooltip"
                                                                      data-placement="top" title="Ficha del Cargo"><i
                                                                          class="feather icon-camera"></i></button>
                                                              </td>
                                                              <td class="align-middle text-center">
                                                                  <span><strong>12/12/2021</strong></span>
                                                              </td>
                                                              <td class="align-middle text-center">
                                                                  <span>Jkriman</span><br>
                                                                  <span>Administrador General</span>
                                                              </td>
                                                              <td class="align-middle text-center">
                                                                  <!--Botón Modal-->
                                                                  <button type="button"
                                                                      class="btn btn-success btn-sm btn-icon"
                                                                      onclick="Aut_rolesAG();" data-toggle="tooltip"
                                                                      data-placement="top" title="Autorizar Roles"><i
                                                                          class="fas fa-sitemap"></i></button>
                                                              </td>
                                                              <td class="align-middle text-center">
                                                                  <!--Botón Modal-->
                                                                  <button type="button"
                                                                      class="btn btn-info btn-sm btn-icon"
                                                                      onclick="Aut_menuAG();" data-toggle="tooltip"
                                                                      data-placement="top" title="Autorizar Módulos"><i
                                                                          class="feather icon-crosshair"></i></button>
                                                              </td>
                                                              <td class="align-middle text-center">
                                                                  <!--Botón Modal-->
                                                                  <button type="button"
                                                                      class="btn btn-danger btn-sm btn-icon"
                                                                      onclick="desasociar();" data-toggle="tooltip"
                                                                      data-placement="top" title="Desasociar Cargo"><i
                                                                          class="feather icon-slash"></i></button>
                                                              </td>
                                                          </tr>
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!--Cierre: Tab Profesionales de la salud-->
                          <!--Tab asistentes-->
                          <div class="tab-pane fade" id="adm_comerciales" role="tabpanel"
                              aria-labelledby="adm_comerciales-tab">
                              <div class="row mb-n4">
                                  <div class="col-sm-12">
                                      <div class="card">
                                          <div class="card-header bg-info">
                                              <div class="col-md-12">
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <h4 class="text-white f-20 mt-2 mb-2 float-left">Administradores
                                                              Comerciales</h4>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="btn-group mr-2 float-right mt- mb-">
                                                              <button type="button" class="btn btn-sm btn-outline-light"
                                                                  onclick="registroNuevoAdmrC();"><i class="fa fa-plus"
                                                                      aria-hidden="true"></i> Registrar nuevo/a
                                                                  Administrador Comercial</button>
                                                              <button type="button"
                                                                  class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split"
                                                                  data-toggle="dropdown" aria-haspopup="true"
                                                                  aria-expanded="false"><span class="sr-only">Toggle
                                                                      Dropdown</span></button>
                                                              <div class="dropdown-menu">
                                                                  <button class="dropdown-item" type="button"
                                                                      class="btn  btn-primary"
                                                                      onclick="asociarAdmC();">Asociar administrador
                                                                      Com</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body">
                                              <table id="tabla_adm_comerciales"
                                                  class="display table table-striped table-hover dt-responsive nowrap"
                                                  style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th class="text-center align-middle">Cod_Rol</th>
                                                          <th class="text-center align-middle">Cargo</th>
                                                          <th class="text-center align-middle">Nombre/Rut</th>
                                                          <th class="text-center align-middle">Contacto</th>
                                                          <th class="text-center align-middle">Descripción</th>
                                                          <th class="text-center align-middle">Fecha_creación</th>
                                                          <th class="text-center align-middle">Responsable/Cargo</th>
                                                          <th class="text-center align-middle">Autorizar Roles</th>
                                                          <th class="text-center align-middle">Autorizar Menú</th>
                                                          <th class="text-center align-middle">eliminar</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <td class="align-middle text-center">
                                                              <span>#005</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span>Administrador Comercial SDI</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span>Julian Venegas conta </span><br>
                                                              <span>7298785-k</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-info btn-sm btn-icon"
                                                                  onclick="ContactoAC();" data-toggle="tooltip"
                                                                  data-placement="top" title="Ficha de Contacto"><i
                                                                      class="fas fa-id-card-alt"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-info btn-sm btn-icon"
                                                                  onclick="descripCargoAC();" data-toggle="tooltip"
                                                                  data-placement="top" title="Ficha del Cargo"><i
                                                                      class="feather icon-camera"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span><strong>12/12/2021</strong></span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span>Jkriman</span><br>
                                                              <span>Administrador General</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-success btn-sm btn-icon"
                                                                  onclick="Aut_rolesAG();" data-toggle="tooltip"
                                                                  data-placement="top" title="Autorizar Roles"><i
                                                                      class="fas fa-sitemap"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-info btn-sm btn-icon"
                                                                  onclick="Aut_menuAG();" data-toggle="tooltip"
                                                                  data-placement="top" title="Autorizar Módulos"><i
                                                                      class="feather icon-crosshair"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-danger btn-sm btn-icon"
                                                                  onclick="desasociar();" data-toggle="tooltip"
                                                                  data-placement="top" title="Desasociar Cargo"><i
                                                                      class="feather icon-slash"></i></button>
                                                          </td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!--Cierre: Tab asistentes-->
                          <!--Tab personal administrativo-->
                          <div class="tab-pane fade" id="administrativos" role="tabpanel"
                              aria-labelledby="administrativos-tab">
                              <div class="row mb-n4">
                                  <div class="col-sm-12">
                                      <div class="card">
                                          <div class="card-header bg-info">
                                              <div class="col-md-12">
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <h4 class="text-white f-20 mt-2 mb-2 float-left">Personal
                                                              administrativo</h4>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="btn-group mr-2 float-right mt- mb-">
                                                              <button type="button" class="btn btn-sm btn-outline-light"
                                                                  onclick="registroNuevoPAdm();"><i class="fa fa-plus"
                                                                      aria-hidden="true"></i> Registrar nuevo/a personal
                                                                  administrativo</button>
                                                              <button type="button"
                                                                  class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split"
                                                                  data-toggle="dropdown" aria-haspopup="true"
                                                                  aria-expanded="false"><span class="sr-only">Toggle
                                                                      Dropdown</span></button>
                                                              <div class="dropdown-menu">
                                                                  <button class="dropdown-item" type="button"
                                                                      class="btn  btn-primary"
                                                                      onclick="asociar_administrativo();">Asociar personal
                                                                      administrativo</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body">
                                              <table id="tabla_personal_adm"
                                                  class="display table table-striped table-hover dt-responsive nowrap"
                                                  style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th class="text-center align-middle">Cod_Rol</th>
                                                          <th class="text-center align-middle">Cargo</th>
                                                          <th class="text-center align-middle">Nombre/Rut</th>
                                                          <th class="text-center align-middle">Contacto</th>
                                                          <th class="text-center align-middle">Descripción</th>
                                                          <th class="text-center align-middle">Fecha_creación</th>
                                                          <th class="text-center align-middle">Responsable/Cargo</th>
                                                          <th class="text-center align-middle">Autorizar Roles</th>
                                                          <th class="text-center align-middle">Autorizar Menú</th>
                                                          <th class="text-center align-middle">eliminar</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <td class="align-middle text-center">
                                                              <span>#005</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span>Secretaria de Gerencia</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span>Juliana Venegas conta </span><br>
                                                              <span>7298785-k</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-info btn-sm btn-icon"
                                                                  onclick="ContactoPersAdm();" data-toggle="tooltip"
                                                                  data-placement="top" title="Ficha de Contacto"><i
                                                                      class="fas fa-id-card-alt"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-info btn-sm btn-icon"
                                                                  onclick="desc_cargoPersAdm();" data-toggle="tooltip"
                                                                  data-placement="top" title="Ficha del Cargo"><i
                                                                      class="feather icon-camera"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span><strong>12/12/2021</strong></span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span>Jkriman</span><br>
                                                              <span>Administrador General</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-success btn-sm btn-icon"
                                                                  onclick="Aut_rolesAG();" data-toggle="tooltip"
                                                                  data-placement="top" title="Autorizar Roles"><i
                                                                      class="fas fa-sitemap"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-info btn-sm btn-icon"
                                                                  onclick="Aut_menuAG();" data-toggle="tooltip"
                                                                  data-placement="top" title="Autorizar Módulos"><i
                                                                      class="feather icon-crosshair"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-danger btn-sm btn-icon"
                                                                  onclick="desasociar();" data-toggle="tooltip"
                                                                  data-placement="top" title="Desasociar Cargo"><i
                                                                      class="feather icon-slash"></i></button>
                                                          </td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!--Cierre: Tab personal administrativo-->
                          <!--Tab personal limpieza y mantencion-->
                          <div class="tab-pane fade" id="personal_apoyo" role="tabpanel"
                              aria-labelledby="personal_apoyo-tab">
                              <div class="row mb-n4">
                                  <div class="col-sm-12">
                                      <div class="card">
                                          <div class="card-header bg-info">
                                              <div class="col-md-12">
                                                  <div class="row">
                                                      <div class="col-md-6">
                                                          <h4 class="text-white f-20 mt-2 mb-2 float-left">Personal de
                                                              Apoyo</h4>
                                                      </div>
                                                      <div class="col-md-6">
                                                          <div class="btn-group mr-2 float-right mt- mb-">
                                                              <button type="button" class="btn btn-sm btn-outline-light"
                                                                  onclick="registroNuevoPAdm();"><i class="fa fa-plus"
                                                                      aria-hidden="true"></i> Registrar Nuevo/a Personal de
                                                                  Apoyo</button>
                                                              <button type="button"
                                                                  class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split"
                                                                  data-toggle="dropdown" aria-haspopup="true"
                                                                  aria-expanded="false"><span class="sr-only">Toggle
                                                                      Dropdown</span></button>
                                                              <div class="dropdown-menu">
                                                                  <button class="dropdown-item" type="button"
                                                                      class="btn  btn-primary"
                                                                      onclick="asociarPersApoyo() ;">Asociar Personal de
                                                                      Apoyo</button>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="card-body">
                                              <table id="tabla_personal_apoyo"
                                                  class="display table table-striped table-hover dt-responsive nowrap"
                                                  style="width:100%">
                                                  <thead>
                                                      <tr>
                                                          <th class="text-center align-middle">Cod_Rol</th>
                                                          <th class="text-center align-middle">Cargo</th>
                                                          <th class="text-center align-middle">Nombre/Rut</th>
                                                          <th class="text-center align-middle">Contacto</th>
                                                          <th class="text-center align-middle">Descripción</th>
                                                          <th class="text-center align-middle">Fecha_creación</th>
                                                          <th class="text-center align-middle">Responsable/Cargo</th>
                                                          <th class="text-center align-middle">Autorizar Roles</th>
                                                          <th class="text-center align-middle">Autorizar Menú</th>
                                                          <th class="text-center align-middle">eliminar</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <td class="align-middle text-center">
                                                              <span>#020</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span>Gasfiter</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span>Emiliano Astaburuaga Perez Cotapos </span><br>
                                                              <span>17298785-k</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-info btn-sm btn-icon"
                                                                  onclick="ContactoPersAdm();" data-toggle="tooltip"
                                                                  data-placement="top" title="Ficha de Contacto"><i
                                                                      class="fas fa-id-card-alt"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-info btn-sm btn-icon"
                                                                  onclick="desc_cargoPersApoyo();" data-toggle="tooltip"
                                                                  data-placement="top" title="Ficha del Cargo"><i
                                                                      class="feather icon-camera"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span><strong>12/12/2021</strong></span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <span>Jkriman</span><br>
                                                              <span>Administrador General</span>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-success btn-sm btn-icon"
                                                                  onclick="Aut_rolesAG();" data-toggle="tooltip"
                                                                  data-placement="top" title="Autorizar Roles"><i
                                                                      class="fas fa-sitemap"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-info btn-sm btn-icon"
                                                                  onclick="Aut_menuAG();" data-toggle="tooltip"
                                                                  data-placement="top" title="Autorizar Módulos"><i
                                                                      class="feather icon-crosshair"></i></button>
                                                          </td>
                                                          <td class="align-middle text-center">
                                                              <!--Botón Modal-->
                                                              <button type="button" class="btn btn-danger btn-sm btn-icon"
                                                                  onclick="desasociar();" data-toggle="tooltip"
                                                                  data-placement="top" title="Desasociar Cargo"><i
                                                                      class="feather icon-slash"></i></button>
                                                          </td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!--Cierre: Tab personal limpieza y mantencion-->
                      </div>
                      <!--Cierre: Pills-->
                  </div>
              </div>
          </div>
      </div>
      <!--****Cierre Container Completo****-->
      @include('administracion.modales.modal_mantenedor_modulos')

  @endsection
