@extends('template.adm_cm.template')
@section('content')

<!--****Container Completo****-->
<style>
    .select2-container--open{
        z-index: 9999999 !important;
    }
</style>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Profesionales del centro</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ ROUTE('laboratorio.adm_general.home') }}" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather  icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('laboratorio.profesionales_institucion') }}">Profesionales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!--Card Nav Pills-->
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills bg-white" id="personal_cm" role="tablist">
                            <li class="nav-item active">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="prof_salud-tab" data-toggle="tab" href="#prof-salud" role="tab" aria-controls="prof_-alud" aria-selected="false">Profesionales</a>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="personal_admin-tab" data-toggle="tab" href="#personal_admin" role="tab" aria-controls="empresas_apoyo" aria-selected="false">Personal Administrativo</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="empresas_apoyo-tab" data-toggle="tab" href="#empresas_apoyo" role="tab" aria-controls="empresas_apoyo" aria-selected="false">Empresas de apoyo</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-info btn-sm mr-1 my-1" id="permisos-tab" data-toggle="tab" href="#permisos" role="tab" aria-controls="permisos" aria-selected="false">Permisos</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <!--Cierre: Card Nav Pills-->
                <div class="tab-content" id="Profesionales_cm">
                    <!--Tab medicos-->
                    <div class="tab-pane fade active show" id="prof-salud" role="tabpanel" aria-labelledby="prof-salud-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Profesionales</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                        <button type="button" class="btn btn-sm btn-outline-light mr-3" onclick="enviar_mensaje_difusion()" @if(!$adm_medico) disabled @endif><i class="feather icon-mail"></i> Difusión</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="asociar_profesional();" @if(!$adm_medico) disabled @endif><i class="fa fa-plus" aria-hidden="true"></i> Asociar profesional</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
                                                    <table id="profesionales_personal" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="align-middle">Nombre / Rut</th>
                                                                <th class="align-middle">Especialidad</th>
                                                                <th class="align-middle">Sucursales</th>
                                                                <th class="align-middle">Contacto</th>
            													<th class="align-middle">Info</th>
            													<th class="align-middle">Convenio</th>
                                                                <th class="align-middle">Mensaje</th>
                                                                <th class="align-middle">Historial</th>
                                                                <th class="align-middle">Acción</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($lista_profesionales['MEDICO'] )
                                                                @foreach ($lista_profesionales['MEDICO'] as $prof_medico )
                                                                    <tr>
                                                                        <td class="align-middle">
                                                                            <span><strong>{{ $prof_medico->nombre.' '.$prof_medico->apellido_uno.' '.$prof_medico->apellido_dos }}</strong></span><br>
                                                                            <span>{{ $prof_medico->rut }}</span>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <span>{{ $prof_medico->TipoEspecialidad()->first()->nombre }}</span>
                                                                            @if (!empty($prof_medico->id_sub_tipo_especialidad))
                                                                                <br>
                                                                                <span>{{ $prof_medico->SubTipoEspecialidad()->first()->nombre }}</span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            @foreach($prof_medico->LugaresAtencion()->get() as $key_lugar => $value_lugar)
                                                                                {{--  COMPLETAR CUANDO TENGAMOS SUCURSALES  --}}
                                                                                @if($institucion->id_lugar_atencion == $value_lugar->id)
                                                                                    <span>{{ $value_lugar->Direccion()->first()->direccion.', '.$value_lugar->Direccion()->first()->ciudad->nombre  }}</span><br>
                                                                                @endif
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="align-middle">
                                                                                <!--Botón Modal contacto -->
                                                                                <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal deposito-->
                                                                                <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos({{ $prof_medico->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                                <!--Botón Modal horario-->
                                                                                <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_cm({{ $prof_medico->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y días de atención"><i class="feather icon-clock"></i></button>
                                                                            </td>
                                                                            <td class="align-middle text-center">
                                                                                <!--Botón Modal convenios-->
                                                                                <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="feather icon-file-text"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal roles y permisos-->
                                                                                <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Ver" @if(!$adm_medico) disabled @endif><i class="feather icon-mail"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <!--Botón Modal roles y permisos-->
                                                                                <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $prof_medico->id }});" @if(!$adm_medico) disabled @endif data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-mail"></i></button>
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                <button type="button" class="btn btn-danger btn-xxs"><i class="feather icon-x"></i> Desasociar</button>
                                                                            </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                            @if($lista_profesionales['OTROS'] )
                                                            @foreach ($lista_profesionales['OTROS'] as $prof_medico )
                                                                <tr>
                                                                    <td class="align-middle">
                                                                        <span><strong>{{ $prof_medico->nombre.' '.$prof_medico->apellido_uno.' '.$prof_medico->apellido_dos }}</strong></span><br>
                                                                        <span>{{ $prof_medico->rut }}</span>
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        <span>{{ $prof_medico->TipoEspecialidad()->first()->nombre }}</span>
                                                                        @if (!empty($prof_medico->id_sub_tipo_especialidad))
                                                                            <br>
                                                                            <span>{{ $prof_medico->SubTipoEspecialidad()->first()->nombre }}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="align-middle">
                                                                        @foreach($prof_medico->LugaresAtencion()->get() as $key_lugar => $value_lugar)
                                                                            {{--  COMPLETAR CUANDO TENGAMOS SUCURSALES  --}}
                                                                            @if($institucion->id_lugar_atencion == $value_lugar->id)
                                                                                <span>{{ $value_lugar->Direccion()->first()->direccion.', '.$value_lugar->Direccion()->first()->ciudad->nombre  }}</span><br>
                                                                            @endif
                                                                        @endforeach
                                                                    </td>
                                                                    <td class="align-middle">
                                                                            <!--Botón Modal contacto -->
                                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <!--Botón Modal deposito-->
                                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos({{ $prof_medico->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>

                                                                            <!--Botón Modal horario-->
                                                                            <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_cm({{ $prof_medico->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y días de atención"><i class="feather icon-clock"></i></button>
                                                                        </td>
                                                                        <td class="align-middle text-center">
                                                                            <!--Botón Modal convenios-->
                                                                            <button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="feather icon-file-text"></i></button>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <!--Botón Modal roles y permisos-->
                                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="mensaje({{ $prof_medico->id }});" data-toggle="tooltip" data-placement="top" title="Ver" @if(!$adm_medico) disabled @endif><i class="feather icon-mail"></i></button>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <!--Botón Modal roles y permisos-->
                                                                            <button type="button" class="btn btn-secondary btn-sm btn-icon" onclick="historial({{ $prof_medico->id }});" @if(!$adm_medico) disabled @endif data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-mail"></i></button>
                                                                        </td>
                                                                        <td class="align-middle">
                                                                            <button type="button" class="btn btn-danger btn-xxs"><i class="feather icon-x"></i> Desasociar</button>
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
                    <!--Cierre: Tab medicos-->

                    <!--Tab personal administrativo-->
                    <div class="tab-pane fade" id="personal_admin" role="tabpanel" aria-labelledby="personal_admin-tab">
                        <div class="row mb-n4">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h4 class="text-white f-20 mt-2 mb-2 float-left">Asistentes</h4>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group mr-2 float-right mt- mb-">
                                                       
                                                        <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_personal();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo/a empleado/a</button>
                                                        <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                   
                                                        <div class="dropdown-menu">
                                                            <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="Asociar_personal();">Asociar asistente</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body" id="contenedor_asistentes_personal">
                                        <table id="asistentes_personal" class="display table table-striped dt-responsive nowrap" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="align-middle">Nombre / Rut</th>
                                                    <th class="align-middle">Tipo</th>
                                                    <th class="align-middle">Sucursales</th>
                                                    <th class="align-middle">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($lista_asistente))
                                                    @foreach ( $lista_asistente as $asistente)
                                                    <tr>
                                                        <td class="align-middle">
                                                            <span><strong>{{ $asistente->nombres.' '.$asistente->apellido_uno.' '.$asistente->apellido_dos }}</strong></span><br>
                                                            <span>{{ $asistente->rut }}</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <span><strong>{{ $asistente->asistente_tipo->nombre }}</strong></span>
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $asistente->direccion()->first()->direccion }} #{{ $asistente->direccion()->first()->numero_dir }}, {{ $asistente->direccion()->first()->ciudad()->first()->nombre }}
                                                        </td>
                                                        <td class="align-middle">
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto('asistente publico',{{ $asistente->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
                                                      
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos('asistente publico',{{ $asistente->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Datos Bancarios"><i class="feather icon-credit-card"></i></button>
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_lab('{{ $asistente->asistente_tipo->nombre }}',{{ $asistente->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="feather icon-clock"></i></button>
                                                     
                                                            <!--Botón Modal-->
                                                            <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="roles_permisos({{ $asistente->asistente_tipo->id }}, {{ $asistente->id_usuario }}, '{{ $asistente->roles }}');" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
                                                
                                                            <button type="button" class="btn btn-info btn-xxs" onclick="editar_datos_asistente({{ $asistente->id }});"><i class="feather icon-edit"></i> Editar</button>
                                                            @if($asistente->contrato !== null)
                                                            <button type="button" class="btn btn-danger btn-xxs" onclick="modal_desactivar_asistente({{ $asistente->id}}, {{ $asistente->contrato->id }}, '{{ $asistente->nombres.' '.$asistente->apellido_uno.' '.$asistente->apellido_dos }}');"><i class="feather icon-x"></i> Desasociar</button>
                                                            @endif
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
                    <!--Cierre: Tab odontologos-->

                    <!--Tab empresas apoyo-->
                    <div class="tab-pane fade" id="empresas_apoyo" role="tabpanel" aria-labelledby="empresas_apoyo-tab">
                        <div class="row">
                          <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <div class="row">
                                           <div class="col-md-6">
                                                <h4 class="text-white f-20 mt-2 mb-2 float-left">Empresas apoyo</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group mr-2 float-right mt- mb-">
                                                    <button type="button" class="btn btn-sm btn-outline-light" onclick="registrar_administrativo();"><i class="fa fa-plus" aria-hidden="true"></i> Registrar nuevo profesional</button>
                                                    <button type="button" class="btn btn-sm btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="sr-only">Toggle Dropdown</span></button>
                                                    <div class="dropdown-menu">
                                                        <button class="dropdown-item" type="button" class="btn  btn-primary" onclick="asociar_profesional();">Asociar Otros profesionales</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
            										<table id="profesionales_otros" class="display table table-striped dt-responsive nowrap" style="width:100%">
            											<thead>
            												<tr>
            													<th class="align-middle">Nombre / Rut</th>
            													<th class="align-middle">Profesión/Especialidad</th>
            													<th class="align-middle">Sucursales</th>
            													<th class="align-middle">Contacto</th>
            													<th class="align-middle">Info</th>
            													<th class="align-middle">Convenio</th>
            													<th class="align-middle">Rol y permisos</th>
            													<th class="align-middle">Acción</th>
            												</tr>
            											</thead>
            											<tbody>
            												<tr>
            													<td class="align-middle">
            														<span><strong>Jaime Kriman</strong></span><br>
            														<span>4.345.466-2</span>
            													</td>
            													<td class="align-middle">
            														<span>Fonoaudiólogo</span><br><span>Fonoaudiólogo clínico</span>
            													</td>
            													<td class="align-middle">
            														<span>Ist Viña del Mar</span><br>
            														<span>Ist Quilpué</span><br>
            														<span>Ist San Felipe</span>
            													</td>
            													<td class="align-middle">
            														<!--Botón Modal-->
            														<button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto(1);" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="feather icon-phone"></i></button>
            													</td>
            													<td class="align-middle text-center">
            														<!--Botón Modal-->
            														<button type="button" class="btn btn-success btn-sm btn-icon" onclick="datos_depositos();" data-toggle="tooltip" data-placement="top" title="Datos bancarios"><i class="feather icon-credit-card"></i></button>
            														 <!--Botón Modal-->
            														<button type="button" class="btn btn-purple btn-sm btn-icon" onclick="horario_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="feather icon-clock"></i></button>
            													</td>
            													<td class="align-middle text-center">
            														<!--Botón Modal-->
            														<button type="button" class="btn btn-danger btn-sm btn-icon" onclick="convenio_profesional_cm();" data-toggle="tooltip" data-placement="top" title="Convenio"><i class="feather icon-file-text"></i></button>
            													</td>
            													<td class="align-middle text-center">
            														<!--Botón Modal-->
            														<button type="button" class="btn btn-secondary btn-icon" onclick="rol_permisos_profesional();" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
            													</td>
            													<td class="align-middle text-center">
            														<button type="button" class="btn btn-info btn-xxs" onclick="editar_datos_profesional();">
            														<i class="feather icon-edit"></i> Editar</button>
            														<button type="button" class="btn btn-danger btn-xxs">
            														<i class="feather icon-x"></i> Desasociar</button>
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
                        </div>
                    </div>
                    <!--Cierre: Tab personal administrativo-->
                    <!--Tab permisos -->
                    <div class="tab-pane fade" id="permisos" role="tabpanel" aria-labelledby="permisos-tab">
                        <div class="card mb-3">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0">Buscar profesional</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 mb-3">
                                        <h6 class="text-c-blue">Escriba rut y seleccione la sucursal</h6>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Rut</label>
                                            <input type="text" class="form-control form-control-sm" name="buscar_profesional_rut" id="buscar_profesional_rut" oninput="formatoRut(this)">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <button type="button" class="btn btn-info btn-sm "  id="buscar_profesional_btn" onclick="buscar_profesional_permisos();">Buscar Profesional</button>
                                    </div>
                                    <div class="col-sm-12 d-none" id="info_profesional_permisos" >
                                        <hr>
                                        <h6 class="text-c-blue">Profesional encontrado:</h6>
                                        <p><strong>Nombre:</strong> <span id="nombre_profesional_permisos"></span></p>
                                        <p><strong>Rut:</strong> <span id="rut_profesional_permisos"></span></p>
                                        <p><strong>Especialidad:</strong> <span id="especialidad_profesional_permisos"></span></p>
                                        <p><strong>Sub Tipo Especialidad:</strong> <span id="subtipo_especialidad_profesional_permisos"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Permisos asignados</h6>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="permiso_cotizar" /> Permiso para cotizar
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="permiso_vender_audifonos" /> Permiso para vender audífonos
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="permiso_control_audifonos" /> Permiso para controlar audífonos
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="permiso_prestar_audifonos" /> Permiso para prestar audífonos
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="permiso_estadisticas_laboratorio" /> Permiso para ver estadísticas del laboratorio
                                    </label>
                                </div>
                                
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="permiso_anular_hora" /> Permiso para anular hora
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="permiso_subir_ver_archivos" /> Subir y ver archivos
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="permiso_eliminar_archivos" /> Eliminar archivos
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="permiso_editar_pacientes" /> Editar pacientes
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" id="permiso_ver_pacientes_centro" /> Ver pacientes del Centro
                                    </label>
                                </div>
                                <!-- Más permisos -->
                                <button class="btn btn-info" onclick="guardar_permisos()">Guardar cambios</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Historial de permisos</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="tabla_historial_permisos">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Permiso</th>
                                            <th>Acción</th>
                                            <th>Usuario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Renderizar historial desde backend -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
		</div>
	</div>
</div>
<!--****Cierre Container Completo****-->
<input type="hidden" name="id_profesional_mensaje" id="id_profesional_mensaje" value="">
@endsection

@section('js-profesionales')
    <script>
$(document).ready(function(){
        $('#msj_para_difusion').select2();
        var dropzone;
        // inicializar dropzone autodiscover false
        Dropzone.autoDiscover = false;
        // inicializar dropzone
        dropzone = new Dropzone('#dropzone', {
            url: "{{ route('mensaje_difusion') }}",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            maxFilesize: 2,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            dictDefaultMessage: 'Arrastra las imágenes aquí para subirlas',
            dictRemoveFile: 'Eliminar',
            dictFileTooBig: 'El archivo es muy grande (MiB). Tamaño máximo: MiB.',
            dictInvalidFileType: 'No puedes subir archivos de este tipo',
            dictCancelUpload: 'Cancelar subida',
            dictUploadCanceled: 'Subida cancelada',
            dictMaxFilesExceeded: 'No puedes subir más archivos',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                var myDropzone = this;
                $('#enviar_mensaje_difusion').click(function() {
                    myDropzone.processQueue();
                });
                this.on('sending', function(file, xhr, formData) {
                    formData.append('id_profesional', $('#id_profesional_mensaje').val());
                    formData.append('mensaje', $('#mensaje').val());
                    formData.append('para', $('#msj_para_difusion').val());
                });
                this.on('success', function(file, response) {
                    console.log(response);
                    if (response.estado == 1)
                    {
                        swal({
                            title: "Mensaje enviado",
                            icon: "success",
                        });
                        $('#mensaje').val('');
                        $('#msj_para_difusion').val('').trigger('change');
                        $('#modal_mensaje').modal('hide');
                    }
                    else
                    {
                        swal({
                            title: "Problema al enviar mensaje",
                            icon: "error",
                        });
                    }
                });
                this.on('error', function(file, response) {
                    console.log(response);
                    swal({
                        title: "Problema al enviar mensaje",
                        icon: "error",
                    });
                });
            }
        });
    });

    /** Modals Horariossss */
    function horario_profesional_lab(tipo, id_profesional, id_lugar_atencion)
    {
        $('#info_funcionario tbody').html('');
        let url = "{{ route('laboratorio.empleado_horario_lugar_atencion') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_empleado : id_profesional,
                tipo_empleado : tipo.toUpperCase(),
                id_lugar_atencion: id_lugar_atencion,
                estado: 2,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {

                $.each(data.registros, function(key, value)
                {
                    let id = value.id;
                    let id_empleado = value.id_empleado;
                    var hora_ingreso = value.hora_ingreso;
                    var hora_salida = value.hora_salida;
                    var hora_inicio_colacion = value.hora_inicio_colacion;
                    var hora_termino_colacion = value.hora_termino_colacion;
                    let dia = '';
                    dias = value.dias_laborales.split(',');
                    for (let i = 0; i < dias.length; i++)
                    {
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
                        } else if (dias[i] == 6) {
                            dia += 'Sabado '
                        } else if (dias[i] == 7) {
                            dia += 'Domingo '
                        }
                    }

                    var fila = '';
                    fila +='<tr>';
                    fila +='    <th class="align-middle">Días Laborales</th>';
                    fila +='    <th class="align-middle">' + dia + '</th>';
                    fila +='</tr>';
                    fila +='<tr>';
                    fila +='    <th class="align-middle">Hora Entrada</th>';
                    fila +='    <th class="align-middle">' + hora_ingreso + '</th>';
                    fila +='</tr>';
                    fila +='<tr>';
                    fila +='    <th class="align-middle">Hora Salida</th>';
                    fila +='    <th class="align-middle">' + hora_salida + '</th>';
                    fila +='</tr>';
                    fila +='<tr>';
                    fila +='    <th class="align-middle">Hora inicio colación</th>';
                    fila +='    <th class="align-middle">' + hora_inicio_colacion + '</th>';
                    fila +='</tr>';
                    fila +='<tr>';
                    fila +='    <th class="align-middle">Hora término colación</th>';
                    fila +='    <th class="align-middle">' + hora_termino_colacion + '</th>';
                    fila +='</tr>';

                    $('#horario_id_contrato_dependiente').val(id);
                    $('#horario_id_personal').val(id_empleado);

                    $('#horario_dias_laborales').val(dias).select2();
                    $('#horario_hora_entrada').val(hora_ingreso);
                    $('#horario_hora_salida').val(hora_salida);
                    $('#horario_hora_entrada_colacion').val(hora_inicio_colacion);
                    $('#horario_hora_salida_colacion').val(hora_termino_colacion);

                    $('#info_funcionario tbody').append(fila);
                });

                $('#horario_dependiente').modal('show');

            }
            else
            {
                swal({
                    title: "El usuario no registra datos de horario.",
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function registrar_asistente(){
        console.log('registrar asistente');
    }
        /*-Modals personal-*/
        function contacto(id)
        {
            let url = "{{ route('laboratorio.profesional_buscar', ['id_profesional' => '__id__']) }}";
            url = url.replace('__id__', id);

            $.ajax({
                url: url,
                type: "get",
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    /** encontrado */
                    $('#contacto_prof_rut').html(data.registro.rut);
                    $('#contacto_prof_email').html(data.registro.email);
                    $('#contacto_prof_telefono1').html(data.registro.telefono_uno);
                    $('#contacto_prof_telefono2').html(data.registro.telefono_dos);
                    $('#contacto_prof_direccion').html(data.direccion);
                    $('#contacto_usuario').modal('show');
                }
                else
                {
                    /** no encontrado */
                    swal({
                        title: "Problema al cargar informacion del Profesional.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function formatoRut(rut)
    {
        var valor = rut.value.replace('.','');
        valor = valor.replace(/\-/g,'');

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

        /** Modals datos bancarios */
        function datos_depositos(id) {

            $('#liquidaciones').html('');
            $('#liquidacion_pills').html('');
            let url = "{{ route('profesional.liquidacion_ver_profesional') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    id_seccion: id
                },
            })
            .done(function(data) {
                if (data.estado == 1)
                {
                    console.log(data.registros);
                    /** encontrado */
                    $('#liquidaciones').html('');
                    $('#liquidacion_pills').html('');


                    $.each(data.registros, function( index, element ) {
                        /** pills */
                        var html_p = '';
                        html_p += '<li class="nav-item">';
                        if(element.principal == 1)
                            html_p += '    <a class="btn btn-outline-info btn-sm mr-1 my-1 active" id="liquidacion_'+index+'-tab" data-toggle="tab" href="#liquidacion_'+index+'" role="tab" aria-controls="liquidacion_'+index+'" aria-selected="true">'+element.banco.nombre+'</a>';
                        else
                            html_p += '    <a class="btn btn-outline-info btn-sm mr-1 my-1" id="liquidacion_'+index+'-tab" data-toggle="tab" href="#liquidacion_'+index+'" role="tab" aria-controls="liquidacion_'+index+'" aria-selected="false">'+element.banco.nombre+'</a>';
                        html_p += '</li>';
                        $('#liquidacion_pills').append(html_p);

                        /** cuerpo */
                        var activo = ' active show ';

                        var html = '';
                        html += '<!-- tab '+index+'-->';
                        if(element.principal == 1)
                            html += '<div class="tab-pane fade '+activo+'" id="liquidacion_'+index+'" role="tabpanel" aria-labelledby="liquidacion_'+index+'-tab">';
                        else
                            html += '<div class="tab-pane fade " id="liquidacion_'+index+'" role="tabpanel" aria-labelledby="liquidacion_'+index+'-tab">';
                        html += '<div class="row info-basica" id="info-basica-1">';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Rut</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_rut">'+element.serie+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Titular</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_nombre">'+element.autor+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Banco</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_banco">'+element.banco.nombre+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Cuenta</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_cuenta">'+element.numero_control+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Tipo Cuenta</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_tipo_cuenta">'+element.otro+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Correo electrónico</label>';
                        html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_email">'+element.email+'</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '    <div class="col-md-12">';
                        html += '        <div class="form-group row">';
                        html += '            <label class="col-sm-4 col-form-label font-weight-bolder">Principal</label>';
                        if(element.principal == 1)
                            html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_principal">Principal</div>';
                        else
                            html += '            <div class="col-sm-7 my-auto ml-2" id="liquidacion_principal">Opcional</div>';
                        html += '        </div>';
                        html += '    </div>';
                        html += '</div>';
                        html += '</div>';
                        $('#liquidaciones').append(html);
                    });

                    $('#dat_bancarios').modal('show');
                }
                else
                {
                    /** no encontrado */
                    swal({
                        title: "El Profesional no posee cuentas registradas.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        /** Modals Horario */
        function horario_profesional_cm(id_profesional, id_lugar_atencion) {

            $('#mi_horario_table tbody').html('');
            let url = "{{ route('laboratorio.prof_horario_lugar_atencion') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_profesional: id_profesional,
                    id_lugar_atencion: id_lugar_atencion,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = data;
                    for (i = 0; i < data.length; i++) {
                        let id = data[i].id;
                        let hora_inicio = data[i].hora_inicio;
                        let hora_termino = data[i].hora_termino;
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
                            }
                        }

                        let j = 1; //contador para asignar id al boton que borrara la fila
                        var fila = '';
                        fila += '<tr class="tr_horario" id="row' + j +'">';
                        fila += '<td class="align-left">' + dia + '</td>';
                        fila += '<td class="align-left">'+hora_inicio + '</td>';
                        fila += '<td class="align-left">' + hora_termino + '</td>';
                        fila += '</tr>';

                        j++;

                        $('#mi_horario_table tbody').append(fila);
                        // $('#mi_horario_table').dataTable({
                        //     "searching": false,
                        //     responsive: true,
                        // })

                        $('#horario_usuario').modal('show');

                    }

                } else {
                    swal({
                        title: "El Profesional no ha configurado su horario.",
                        icon: "error",
                    });
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
            $('#horario_usuario').modal('show');
        }

        function mensaje(id) {
            console.log(id);
            let url = "{{ ROUTE('laboratorio.dame_profesional_cm') }}";
            $.ajax({
                type:'post',
                url: url,
                data:{
                    id:id,
                    _token:CSRF_TOKEN
                },
                success: function(resp){
                    $('#id_profesional_mensaje').val(id);
                    console.log(resp);
                    let profesional = resp.profesional;
                    $('#para_destino').val(profesional.nombre+" "+profesional.apellido_uno+" "+profesional.apellido_dos);
                    $('#mensaje_profesional').modal('show');
                },
                error: function(error){
                    console.log(error);
                }
            })

        }

        function enviar_mensaje_difusion() {
            $('#mensaje_difusion').modal('show');
        }

        function historial(id){
            // abrir modal de historial
            $('#historial_mensajes_profesional').modal('show');
            let url = "{{ ROUTE('laboratorio.historial_mensajes_profesional',['id' => '__ID__']) }}";
            url = url.replace('__ID__',id);

            $.ajax({
                type:'get',
                url: url,
                success: function(resp){
                    console.log(resp);
                    let mensajes = resp.mensajes;
                    let html = '';
                    if(mensajes.length == 0){
                        html += '<div class="row">';
                        html += '<div class="col-md-12">';
                        html += '<div class="card">';
                        html += '<div class="card-header">';
                        html += '<h4 class="card-title">No hay mensajes</h4>';
                        html += '</div>';
                        html += '<div class="card-body">';
                        html += '<p>No hay mensajes enviados a este profesional.</p>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    }else{
                        mensajes.forEach(mensaje => {
                            html += '<div class="row">';
                            html += '<div class="col-md-12">';
                            html += '<div class="card">';
                            html += '<div class="card-header">';
                            html += '<h4 class="card-title">'+mensaje.datos_mensaje.titulo+'</h4>';
                            html += '</div>';
                            html += '<div class="card-body">';
                            html += '<p>'+mensaje.datos_mensaje.mensaje+'</p>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                        });
                    }

                    $('#historial_mensajes_profesional_body').html(html);
                },
                error: function(error){
                    console.log(error);
                }
            })
        }

        function buscar_profesional_permisos() {
            let rut = $('#buscar_profesional_rut').val();
            let url = "{{ ROUTE('profesional.buscador') }}";
            $.ajax({
                type:'get',
                url: url,
                data:{
                    rut:rut,
                },
                success: function(resp){
                    console.log(resp);
                    let profesionales = resp.registros;
                    console.log(profesionales);
                    if(profesionales.length == 0){
                        $('#info_profesional_permisos').addClass('d-none');
                        swal({
                            title: "Profesional no encontrado",
                            icon: "error",
                        });
                        return;
                    }
                    $('#info_profesional_permisos').removeClass('d-none');
                    let profesional = profesionales[0];
                    $('#nombre_profesional_permisos').text(profesional.profesionales_nombre+" "+profesional.profesionales_apellido_uno+" "+profesional.profesionales_apellido_dos);
                    $('#rut_profesional_permisos').text(profesional.profesionales_rut);
                    $('#especialidad_profesional_permisos').text(profesional.tipos_especialidad_nombre);
                    $('#subtipo_especialidad_profesional_permisos').text(profesional.sub_tipo_especialidad_nombre);
                    $('#permiso_cotizar').prop('checked', profesional.permiso_cotizar == 1 ? true : false);
                    $('#permiso_vender_audifonos').prop('checked', profesional.permiso_vender_audifonos == 1 ? true : false);
                    $('#permiso_control_audifonos').prop('checked', profesional.permiso_control_audifonos == 1 ? true : false);
                    $('#permiso_estadisticas_laboratorio').prop('checked', profesional.permiso_estadisticas_laboratorio == 1 ? true : false);
                    $('#permiso_anular_hora').prop('checked', profesional.permiso_anular_hora == 1 ? true : false);
                    $('#permiso_subir_ver_archivos').prop('checked', profesional.permiso_subir_ver_archivos == 1 ? true : false);
                    $('#permiso_eliminar_archivos').prop('checked', profesional.permiso_eliminar_archivos == 1 ? true : false);
                    $('#permiso_editar_pacientes').prop('checked', profesional.permiso_editar_pacientes == 1 ? true : false);
                    $('#permiso_ver_pacientes_centro').prop('checked', profesional.permiso_ver_pacientes_centro == 1 ? true : false);
                    dame_permisos_historial(profesional.profesionales_id);
                },
                error: function(error){
                    console.log(error);
                }
            })
        }

        function dame_permisos_historial(id_profesional) {
            let url = "{{ ROUTE('laboratorio.profesional.obtener_permisos') }}";
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    id_profesional: id_profesional,
                    _token: CSRF_TOKEN
                },
                success: function(resp) {
                    console.log(resp);
                    if(resp.estado != 1){
                        swal({
                            title: "Error al obtener historial de permisos",
                            text: resp.mensaje,
                            icon: "error",
                        });
                        return;
                    }
                    let permisos = resp.permisos;
                    let html = '';
                    permisos.forEach(entry => {
                        html += '<tr>';
                        html += '<td>' + (entry.created_at ? entry.created_at.substring(0, 19).replace('T', ' ') : '') + '</td>';
                        html +=  `
                        <td>
                            ${entry.permiso_cotizar == 1 ? 'Cotizar, ' : ''}
                            ${entry.permiso_vender_audifonos == 1 ? 'Vender Audífonos, ' : ''}
                            ${entry.permiso_anular_hora == 1 ? 'Anular Hora, ' : ''}
                            ${entry.permiso_control_audifonos == 1 ? 'Controlar Audífonos, ' : ''}
                            ${entry.permiso_estadisticas_laboratorio == 1 ? 'Ver Estadísticas del Laboratorio, ' : ''}
                            ${entry.permiso_subir_ver_archivos == 1 ? 'Subir y Ver Archivos, ' : ''}
                            ${entry.permiso_eliminar_archivos == 1 ? 'Eliminar Archivos, ' : ''}
                            ${entry.permiso_editar_pacientes == 1 ? 'Editar Pacientes, ' : ''}
                            ${entry.permisos_ver_pacientes == 1 ? 'Ver Pacientes del Centro, ' : ''}
                        </td>
                        `;
                        
                        html += '<td>Asignado</td>';
                        html += '<td>' + (entry.usuario ? entry.usuario : '-') + '</td>';
                        html += '</tr>';
                    });
                    $('#tabla_historial_permisos tbody').html(html);
        
                    // Seleccionar los permisos del último registro (más reciente)
                    if (permisos.length > 0) {
                        let ultimo = permisos[0]; // Si el array está ordenado por fecha descendente
                        $('#permiso_cotizar').prop('checked', ultimo.permiso_cotizar == 1);
                        $('#permiso_vender_audifonos').prop('checked', ultimo.permiso_vender_audifonos == 1);
                        $('#permiso_control_audifonos').prop('checked', ultimo.permiso_control_audifonos == 1);
                        $('#permiso_estadisticas_laboratorio').prop('checked', ultimo.permiso_estadisticas_laboratorio == 1);
                        $('#permiso_anular_hora').prop('checked', ultimo.permiso_anular_hora == 1);
                        $('#permiso_subir_ver_archivos').prop('checked', ultimo.permiso_subir_ver_archivos == 1);
                        $('#permiso_eliminar_archivos').prop('checked', ultimo.permiso_eliminar_archivos == 1);
                        $('#permiso_editar_pacientes').prop('checked', ultimo.permiso_editar_pacientes == 1);
                        $('#permiso_ver_pacientes_centro').prop('checked', ultimo.permisos_ver_pacientes == 1);
                    }
                },
                error: function(error) {
                    console.log(error);
                    $('table tbody').html(`
                        <tr>
                            <td colspan="4">Error al cargar historial</td>
                        </tr>
                    `);
                }
            });
        }

        
        function guardar_permisos(){
            let rut = $('#buscar_profesional_rut').val();
            let permiso_cotizar = $('#permiso_cotizar').is(':checked') ? 1 : 0;
            let permiso_vender_audifonos = $('#permiso_vender_audifonos').is(':checked') ? 1 : 0;
            let permiso_control_audifonos = $('#permiso_control_audifonos').is(':checked') ? 1 : 0;
            let permiso_prestar_audifonos = $('#permiso_prestar_audifonos').is(':checked') ? 1 : 0;
            let permiso_estadisticas_laboratorio = $('#permiso_estadisticas_laboratorio').is(':checked') ? 1 : 0;
            let permiso_anular_hora = $('#permiso_anular_hora').is(':checked') ? 1 : 0;
            let permiso_subir_ver_archivos = $('#permiso_subir_ver_archivos').is(':checked') ? 1 : 0;
            let permiso_eliminar_archivos = $('#permiso_eliminar_archivos').is(':checked') ? 1 : 0;
            let permiso_editar_pacientes = $('#permiso_editar_pacientes').is(':checked') ? 1 : 0;
            let permiso_ver_pacientes_centro = $('#permiso_ver_pacientes_centro').is(':checked') ? 1 : 0;
            let url = "{{ ROUTE('laboratorio.profesional.guardar_permisos') }}";
            $.ajax({
                type:'post',
                url: url,
                data:{
                    rut:rut,
                    permiso_cotizar:permiso_cotizar,
                    permiso_vender_audifonos:permiso_vender_audifonos,
                    permiso_control_audifonos:permiso_control_audifonos,
                    permiso_prestar_audifonos:permiso_prestar_audifonos,
                    permiso_estadisticas_laboratorio:permiso_estadisticas_laboratorio,
                    permiso_anular_hora:permiso_anular_hora,
                    permiso_subir_ver_archivos:permiso_subir_ver_archivos,
                    permiso_eliminar_archivos:permiso_eliminar_archivos,
                    permiso_editar_pacientes:permiso_editar_pacientes,
                    permiso_ver_pacientes_centro:permiso_ver_pacientes_centro,
                    _token:CSRF_TOKEN
                },
                success: function(resp){
                    console.log(resp);
                    if(resp.estado == 1){
                        swal({
                            title: "Permisos guardados correctamente",
                            icon: "success",
                        });
                    }else{
                        swal({
                            title: "Error al guardar permisos",
                            icon: "error",
                        });
                    }
                },
                error: function(error){
                    console.log(error);
                }
            });
        }

    </script>
@endsection

@section('page-script')
<script>

</script>
@endsection

@section('modales-profesionales_inst')
    @include('app.laboratorio.modales.profesional.asociar_profesional')

    @include('app.adm_cm.modal_adm.mensaje_profesional')
    @include('app.adm_cm.modal_adm.mensaje_difusion')
    @include('app.adm_cm.modal_adm.historial_mensajes')

    @include('app.adm_cm.modales.personal.horario_personal')
    @include('app.adm_cm.modales.personal.editar_personal')

    @include('app.adm_cm.modal_adm.datos_banco')
    @include('app.adm_cm.modal_adm.horario_usuario')
    @include('app.adm_cm.modal_adm.convenio_usuario')
    @include('app.adm_cm.modal_adm.contacto_usuario')
    @include('app.laboratorio.modales.personal.registrar_personal')
    @include('app.adm_cm.modales.personal.asociar_personal')
    {{-- @include('app.adm_cm.modales.personal.contacto_personal') --}}
    {{--  @include('app.adm_cm.modal_adm.editar_profesional')  --}}
    {{--  @include('app.adm_cm.modal_adm.registrar_profesional')  --}}
    {{--  @include('app.adm_cm.modal_adm.roles_permisos_prof')  --}}
    @include('app.adm_cm.modal_adm.liquidacion_profesionales')
@endsection


